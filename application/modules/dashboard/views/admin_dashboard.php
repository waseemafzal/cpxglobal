 <div class="row">

                <div class="col-lg-3 col-xs-6 ">

                    <!-- small box -->

                    <div class="small-box bg-aqua">

                        <div class="inner">

                            <h3><?php echo   getcount('tbl_training'); ?></h3>

                            <p>Courses</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-bag"></i>

                        </div>

                        <a href="trainings" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                <!-- ./col -->

                <div class="col-lg-3 col-xs-6">

                    <!-- small box <sup style="font-size: 20px">%</sup> -->

                    <div class="small-box bg-green">

                        <div class="inner">

                            <h3><?php echo  getcount('tbl_trainer'); ?></h3>

                            <p>Total Trainer</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-stats-bars"></i>

                        </div>

                        <a href="<?php echo base_url();?>trainer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6 ">

                    <!-- small box -->

                    <div class="small-box bg-red">

                        <div class="inner">
                            <h3><?php echo  getcount('tbl_membershippackage'); ?></h3>

                            <p>Memberships</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-pie-graph"></i>

                        </div>

                        <a href="memberships" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>
                <div class="col-lg-3 col-xs-6">

                    <!-- small box buyer_count -->

                    <div class="small-box bg-yellow">

                        <div class="inner">

                            <h3><?php echo  count_tbl_where('users','user_type',USER); ?></h3>

                            <p>Registered Users </p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-person-add"></i>

                        </div>

                        <a href="<?php echo base_url();?>auth/view_users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

              
                <!-- ./col -->

                <!-- ./col -->

            </div>
            <div class="row">

                

                <!-- ./col -->

                <div class="col-lg-3 col-xs-6">

                    <!-- small box <sup style="font-size: 20px">%</sup> -->

                    <div class="small-box bg-green">

                        <div class="inner">

                            <h3><?php echo  getcount('tbl_event'); ?></h3>

                            <p>Total Events</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-stats-bars"></i>

                        </div>

                        <a href="<?php echo base_url();?>event" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6 ">

                    <!-- small box -->

                    <div class="small-box bg-red">

                        <div class="inner">
                            <h3><?php echo  getcount('customerdata'); ?></h3>

                            <p>Customerdata</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-pie-graph"></i>

                        </div>

                        <a href="customerdata" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>
                <div class="col-lg-3 col-xs-6">

                    <!-- small box buyer_count -->

                    <div class="small-box bg-purple">

                        <div class="inner">

                            <h3><?php echo  getcount('blogpost'); ?></h3>

                            <p> Blogs </p>

                        </div>

                        <div class="icon">

                            <i class="fa fa-list"></i>

                        </div>

                        <a href="<?php echo base_url();?>blogpost" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    </div>

                </div>

              
                <!-- ./col -->

                <!-- ./col -->

            </div>