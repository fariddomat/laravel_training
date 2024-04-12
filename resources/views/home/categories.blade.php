<x-site-layout>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('home') }}/img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Classes</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                            <span>Class</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    @guest
    <!-- Register Section Begin -->
    <section class="register-section classes-page spad">
        <div class="container">
            <div class="classes-page-text">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="register-text">
                            <div class="section-title">
                                <h2>Register Now</h2>
                                <p>The First 7 Day Trial Is Completely Free With The Teacher</p>
                            </div>
                            <form action="#" class="register-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="name">First Name</label>
                                        <input type="text" id="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email">Your email address</label>
                                        <input type="text" id="email">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" id="last-name">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="mobile">Mobile No*</label>
                                        <input type="text" id="mobile">
                                    </div>
                                </div>
                                <button type="submit" class="register-btn">Get Started</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="register-pic">
                            <img src="{{ asset('home') }}/img/register-pic.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Section End -->

    @endguest

  <!-- Classes Section Begin -->
  <section class="classes-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>UNLIMITED Categories</h2>
                </div>
            </div>
        </div>
        <div class="row classes-slider owl-carousel">
            @foreach ($categories as $category)
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="{{ asset($category->image) }}">
                        <div class="si-text">
                            <h4>{{ $category->name }}</h4>
                            <span><i class="fa fa-user"></i> {{ $category->user->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Classes Section End -->

    <!-- Classes Timetable Section Begin -->
    <section class="classes-timetable spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Class Timetable</h2>
                    </div>
                    <div class="nav-controls">
                        <ul>
                            <li class="active" data-tsfilter="all">All Class</li>
                            <li data-tsfilter="gym">Gym</li>
                            <li data-tsfilter="crossfit">Crossfit</li>
                            <li data-tsfilter="cardio">Cardio</li>
                            <li data-tsfilter="body">Body</li>
                            <li data-tsfilter="yoga">Yoga</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="schedule-table">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="workout-time">10.00</td>
                                    <td class="hover-bg ts-item" data-tsmeta="gym">
                                        <h6>Gym</h6>
                                        <span>10.00 - 11.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="yoga">
                                        <h6>Yoga</h6>
                                        <span>10.00 - 12.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="body">
                                        <h6>Body</h6>
                                        <span>10.00 - 12.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="cardio">
                                        <h6>Cardio</h6>
                                        <span>10.00 - 11.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="workout-time">14.00</td>
                                    <td></td>
                                    <td class="hover-bg ts-item">
                                        <h6>Running</h6>
                                        <span>14.00 - 16.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item">
                                        <h6>Box</h6>
                                        <span>14.00 - 15.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="gym">
                                        <h6>Gym</h6>
                                        <span>14.00 - 16.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="workout-time">16.00</td>
                                    <td class="hover-bg ts-item" data-tsmeta="cardio">
                                        <h6>Cardio</h6>
                                        <span>16.00 - 18.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="gym">
                                        <h6>Gym</h6>
                                        <span>16.00 - 19.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="yoga">
                                        <h6>Yoga</h6>
                                        <span>16.00 - 18.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="gym">
                                        <h6>Gym</h6>
                                        <span>16.00 - 20.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="workout-time">18.00</td>
                                    <td class="hover-bg ts-item">
                                        <h6>Box</h6>
                                        <span>18.00 - 22.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td class="hover-bg ts-item" data-tsmeta="body">
                                        <h6>Body</h6>
                                        <span>18.00 - 20.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="crossfit">
                                        <h6>Crossfit</h6>
                                        <span>18.00 - 21.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="cardio">
                                        <h6>Cardio</h6>
                                        <span>18.00 - 22.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="workout-time">20.00</td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="gym">
                                        <h6>Gym</h6>
                                        <span>20.00 - 12.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td class="hover-bg ts-item" data-tsmeta="body">
                                        <h6>Body</h6>
                                        <span>20.00 - 21.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="cardio">
                                        <h6>Cardio</h6>
                                        <span>20.00 - 22.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="hover-bg ts-item" data-tsmeta="crossfit">
                                        <h6>Crossfit</h6>
                                        <span>20.00 - 21.00</span>
                                        <div class="trainer-name">
                                            John Smith
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trainer Table Schedule Section End -->

</x-site-layout>
