<x-site-layout>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('home') }}/img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Categories</h2>
                        <div class="breadcrumb-option">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>categories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


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
                        <a href="{{ route('categories.show', $category) }}">
                            <div class="single-class-item set-bg" data-setbg="{{ asset($category->image) }}">
                                <div class="si-text">
                                    <h4>{{ $category->name }}</h4>
                                    <span><i class="fa fa-user"></i> {{ $category->user->name }}</span>
                                </div>
                            </div>
                        </a>
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
                        <h2>Categories Timetable</h2>
                    </div>
                    <div class="nav-controls">
                        <ul>
                            <li class="active" data-tsfilter="all">All Class</li>
                            @foreach ($categories as $category)
                                <li data-tsfilter="{{ $category->name }}">{{ $category->name }}</li>
                            @endforeach
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
                                    @php
                                        $daysOfWeek = [
                                            'Monday',
                                            'Tuesday',
                                            'Wednesday',
                                            'Thursday',
                                            'Friday',
                                            'Saturday',
                                            'Sunday',
                                        ];
                                    @endphp
                                    @foreach ($daysOfWeek as $day)
                                        <th>{{ $day }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $time => $daySchedules)
                                    <tr>
                                        <td class="workout-time">
                                            @php
                                                $days = $daySchedules->keys()->unique()->sort();
                                            @endphp

                                        </td>
                                        @foreach ($daysOfWeek as $currentDay)
                                            @isset($daySchedules[$currentDay])
                                                @foreach ($daySchedules[$currentDay] as $schedule)
                                                    @if ($schedule->day_of_week === $currentDay && $time == $schedule->start_time)
                                                        <td class="hover-bg ts-item"
                                                            data-tsmeta="{{ $schedule->category->name }}"><a href="{{ route('categories.show', $category) }}">

                                                            <h6>{{ $schedule->category->name }}</h6>
                                                            <span>{{ $schedule->start_time }} -
                                                                {{ $schedule->end_time }}</span>
                                                            <div class="trainer-name">
                                                                {{ $schedule->category->user->name }}
                                                            </a>
                                                        </td>
                        </div>
                    @else
                        <td></td>
                        @endif
                        @endforeach
                    @else
                        <td></td>
                    @endisset
                    @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Trainer Table Schedule Section End -->

</x-site-layout>
