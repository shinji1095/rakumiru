<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="{{ asset(("script/userview/candidate.js")) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script type="text/javascript" src="https://github.com/nagix/chartjs-plugin-colorschemes/releases/download/v0.2.0/chartjs-plugin-colorschemes.min.js"></script>
  </head>
  <body>
      <!-- 上のナビゲーションバー -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="nav-top">
        <a class="navbar-brand" href="#">Rukumiru</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <!-- 上のナビゲーションバー 　終わり-->

    <div class="container-fluid">
      <div class="row">
        <!-- 左のナビゲーションバー -->
        <div class="col-2 position-fixed bg-light pt-3  px-0" id="sidebar">
          <!-- nav-tab -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" role="tab" href="#outgo" id="outgo-tab">Outgoes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" role="tab" href="#income" id="income-tab">Incomes</a>
            </li>
          </ul>
          <!-- nav-tab end -->

          <div class="tab-content">
            <div class="tab-pane fade show active" id="outgo" role="tabpanel" aria-labelledby="outgo-tab">
              <div class="accordion" id="accordionExample1">
                <!-- ADD form -->
                <div class="card">
                  <div class="card-header" id="form-add-outgo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                        ADD
                        <small>outgoes</small>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseOne1" class="collapse" aria-labelledby="form-add-outgo" data-parent="#accordionExample1">
                    <div class="card-body">
                      <form action="{{ route("outgo.add", ["userID" => session("userID")]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="hidden" name="userID" value="{{ session("userID") }}">
                        </div>
                        <div class="form-group">
                          <label for="add-amount">Amount of money</label>
                          <input type="number" class="form-control" id="add-amount" aria-describedby="emailHelp" name="amount">
                        </div>
                        <div class="form-group">
                          <label for="add-item">Item</label>
                          <input type="text" class="form-control" id="add-item" name="item">
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" id="add-typeTrue" value="1" checked>
                          <label class="form-check-label" for="add-typeTure">
                            Necessary
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" id="add-typeFalse" value="0">
                          <label class="form-check-label" for="add-typeFalse">
                            Wasted
                          </label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- ADD form end -->

                <!-- EDIT form -->
                <div class="card">
                  <div class="card-header" id="form-edit-outgo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                        EDIT
                        <small>outgoes</small>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo1" class="collapse" aria-labelledby="form-edit-outgo" data-parent="#accordionExample1">
                    <div class="card-body">
                      <form action="{{ route("outgo.add", ["userID" => session("userID")]) }}" method="post" id="outgo-editForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="hidden" name="userID" value="{{ session("userID") }}">
                        </div>
                        <div class="form-group">
                          <label for="edit-item">Item</label>
                          <input type="text" class="form-control" id="edit-item" aria-describedby="emailHelp" name="item">
                        </div>
                        <div class="form-group">
                          <label for="edit-date">Date</label>
                          <input type="Date" class="form-control" id="edit-date" name="date">
                        </div>
                        <div class="d-flex justify-content-start">
                          <button type="button" class="btn btn-secondary btn-sm" onclick="getEditData()">candidate</button>
                            <!-- クリックされたときにフォームの内容を入手して候補を表示 -->
                              <!-- リンク先にデータベースにアクセスするためのリンクを指定 -->
                              <ul id="outgo-editDropdown"></ul>
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- EDIT form end -->

                <!-- DELETE form -->
                <div class="card">
                  <div class="card-header" id="form-delete-outgo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                        DELETE
                        <small>outgoes</small>

                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree1" class="collapse" aria-labelledby="form-delete-outgo" data-parent="#accordionExample1">
                    <div class="card-body">
                      <form>
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="hidden" name="userID" value="{{ session("userID") }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Item</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="item">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Date</label>
                          <input type="date" class="form-control" id="exampleInputPassword1" name="date">
                        </div>
                        <button type="button" name="button" class="btn btn-secondary" onclick="getDeleteData()">candidate</button>
                        <ul id="outgo-deleteDropdown"></ul>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- DELETE form end -->
              </div>

              <div class="tab-pane fade active" id="income" role="tabpanel" aria-labelledby="income-tab">
                <div class="accordion" id="accordionExample2">
                  <!-- ADD form -->
                  <div class="card">
                    <div class="card-header" id="form-add-income">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                          ADD
                          <small>incomes</small>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseOne2" class="collapse" aria-labelledby="form-add-income" data-parent="#accordionExample2">
                      <div class="card-body">
                        <form action="{{ route("outgo.add", ["userID" => session("userID")]) }}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <input type="hidden" name="userID" value="{{ session("userID") }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Amount of money</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Item</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="item">
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Necessary
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                              Wasted
                            </label>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- ADD form end -->

                  <!-- EDIT form -->
                  <div class="card">
                    <div class="card-header" id="form-edit-income">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                          EDIT
                          <small>incomes</small>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo2" class="collapse" aria-labelledby="form-edit-income" data-parent="#accordionExample2">
                      <div class="card-body">
                        <form action="{{ route("outgo.add", ["userID" => session("userID")]) }}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <input type="hidden" name="userID" value="{{ session("userID") }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Amount of money</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Item</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="item">
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Necessary
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                              Wasted
                            </label>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- EDIT form end -->

                  <!-- DELETE form -->
                  <div class="card">
                    <div class="card-header" id="form-delete-income">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                          DELETE
                          <small>incomes</small>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree2" class="collapse" aria-labelledby="form-delete-income" data-parent="#accordionExample2">
                      <div class="card-body">
                        <form action="{{ route("outgo.add", ["userID" => session("userID")]) }}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <input type="hidden" name="userID" value="{{ session("userID") }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Amount of money</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Item</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="item">
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Necessary
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                              Wasted
                            </label>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- DELETE form end -->
                </div>
              </div>
            </div>


            </div>
          </div>

        </div>
        <!-- 左のナビゲーションバー　終わり -->
      </div>

      <div class="row justify-content-end">
        <!-- グラフの描画画面 -->
        <div class="col-5 p-0">
            <button id="prev" type="button" class="button">前の月</button>
            <button id="next" type="button" class="button">次の月</button>
            <div id="calendar" class="table"></div>
        </div>
        <!-- グラフの描画画面　終わり -->
        <div class="col-4 p-2">
          <canvas id="statusChart" ></canvas>
          <canvas id="myChart"></canvas>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-4">
        </div>
      </div>
    </div>

    <script type="text/javascript" src="{{ asset("script/userview/chart_.js") }}"></script>
    <script type="text/javascript" src="{{ asset("script/userview/calender.js") }}"></script>
    <script type="text/javascript" src="{{ asset("script/userview/style.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
