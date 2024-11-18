<h2 class="h5 no-margin-bottom">Dashboard</h2>
</div>
</div>
<section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"></div><strong>Clients</strong>
                        </div>
                        <div class="number dashtext-1">{{ $userCount }}</div>
                    </div>
                    <div class="progress progress-template">
                        <div role="progressbar" style="width: {{ $userCount }}%" aria-valuenow="{{ $userCount }}"
                            aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"></div><strong>All Rooms</strong>
                        </div>
                        <div class="number dashtext-1">{{ $roomCount }}</div>
                    </div>
                    <div class="progress progress-template">
                        <div role="progressbar" style="width: {{ $roomCount }}%" aria-valuenow="{{ $roomCount }}"
                            aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"></div><strong>Available Rooms</strong>
                        </div>
                        <div class="number dashtext-1">{{ $availableRooms }}</div>
                    </div>
                    <div class="progress progress-template">
                        <div role="progressbar" style="width: {{ $availableRooms }}%" aria-valuenow="{{ $availableRooms }}"
                            aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Pending Bookings</strong></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome3"></canvas>
                        <div class="text"><strong class="d-block">{{ $pendingBookingsCount }}</strong><span
                                class="d-block">Pending</span></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <div class="stats-with-chart-1 block">
                    <div class="title"> <strong class="d-block">Sales Difference</strong><span class="d-block">Lorem
                            ipsum dolor sit</span></div>
                    <div class="row d-flex align-items-end justify-content-between">
                        <div class="col-5">
                            <div class="text"><strong class="d-block dashtext-3">$740</strong><span
                                    class="d-block">May 2017</span><small class="d-block">320 Sales</small></div>
                        </div>
                        <div class="col-7">
                            <div class="bar-chart chart">
                                <canvas id="salesBarChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
</section>
<section class="margin-bottom-sm">
    <div class="container-fluid">
        <div class="row d-flex align-items-stretch">
        </div>
    </div>
</section>
<footer class="footer">
    <div class="footer__block block no-margin-bottom">
        <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="no-margin-bottom">MT. GARABON HOTEL<a target="_blank"</p>
        </div>
    </div>
</footer>
