@extends('layouts.master')

@section('content')
    <div class="main-container">

        <!-- Page Content -->
        <div class="container">

            <!-- Header -->
            <a name="about"></a>
            <div class="intro-header">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="intro-message">
                                <h1>Seatly</h1>
                                <h3>A Ticket Booking System</h3>
                                <hr class="intro-divider">
                                <div class="row">
                                        <div class="col-md-3 portfolio-item">
                                          <div class="panel panel-cover">
                                            <div class="panel-heading text-center">London Has Fallen</div>
                                            <div class="panel-body">
                                              <a href="book">
                                                <img class="img-responsive img-cover" src=" {{ URL::asset('img/cover/1.jpg') }}" alt="cover"></img>
                                              </a>
                                            </div>
                                          </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
            <!-- /.intro-header -->

            <!-- Page Content -->

            <a  name="services"></a>
            <div class="content-section-a">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="dark">Book tickets for the biggest newest movies today!</h2>
                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
            <!-- /.content-section-a -->

            <div class="spacer"></div>

            </div>
    </div>
@stop