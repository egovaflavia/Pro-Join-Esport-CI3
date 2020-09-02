<div style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">

    <div class="col_3">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-thumbs-up icon-rounded"></i>
                <div class="stats">
                    <?php
                    $this->db->like('sponsor_id');
                    $this->db->from('tb_sponsor');
                    ?>
                    <h5><?php echo $this->db->count_all_results() ?><br></h5> <span> Sponsor</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-user user1 icon-rounded"></i>
                <div class="stats">
                    <?php
                    $this->db->like('player_id');
                    $this->db->from('tb_player');
                    ?>
                    <h5><strong><?php echo $this->db->count_all_results() ?></strong></h5>
                    <span>Players</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-users user1 icon-rounded" style="background-color: #06D995"></i>
                <div class="stats">
                    <?php
                    $this->db->like('tim_id');
                    $this->db->from('tb_tim');
                    ?>
                    <h5><strong><?php echo $this->db->count_all_results() ?></strong></h5>
                    <span>Tims</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                <div class="stats">
                    <?php
                    $this->db->like('tournament_id');
                    $this->db->from('tb_tournament');
                    ?>
                    <h5><strong><?php echo $this->db->count_all_results() ?></strong></h5>
                    <span>Tournaments</span>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>


    <div class="col-md-12 span_10 ">
        <div class="cal1 cal_2">
            <div class="clndr">
                <div class="clndr-controls">
                    <div class="clndr-control-button">
                        <p class="clndr-previous-button">previous</p>
                    </div>
                    <div class="month">July 2015</div>
                    <div class="clndr-control-button rightalign">
                        <p class="clndr-next-button">next</p>
                    </div>
                </div>
                <table class="clndr-table" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr class="header-days">
                            <td class="header-day">S</td>
                            <td class="header-day">M</td>
                            <td class="header-day">T</td>
                            <td class="header-day">W</td>
                            <td class="header-day">T</td>
                            <td class="header-day">F</td>
                            <td class="header-day">S</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day adjacent-month last-month calendar-day-2015-06-28">
                                <div class="day-contents">28</div>
                            </td>
                            <td class="day adjacent-month last-month calendar-day-2015-06-29">
                                <div class="day-contents">29</div>
                            </td>
                            <td class="day adjacent-month last-month calendar-day-2015-06-30">
                                <div class="day-contents">30</div>
                            </td>
                            <td class="day calendar-day-2015-07-01">
                                <div class="day-contents">1</div>
                            </td>
                            <td class="day calendar-day-2015-07-02">
                                <div class="day-contents">2</div>
                            </td>
                            <td class="day calendar-day-2015-07-03">
                                <div class="day-contents">3</div>
                            </td>
                            <td class="day calendar-day-2015-07-04">
                                <div class="day-contents">4</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day calendar-day-2015-07-05">
                                <div class="day-contents">5</div>
                            </td>
                            <td class="day calendar-day-2015-07-06">
                                <div class="day-contents">6</div>
                            </td>
                            <td class="day calendar-day-2015-07-07">
                                <div class="day-contents">7</div>
                            </td>
                            <td class="day calendar-day-2015-07-08">
                                <div class="day-contents">8</div>
                            </td>
                            <td class="day calendar-day-2015-07-09">
                                <div class="day-contents">9</div>
                            </td>
                            <td class="day calendar-day-2015-07-10">
                                <div class="day-contents">10</div>
                            </td>
                            <td class="day calendar-day-2015-07-11">
                                <div class="day-contents">11</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day calendar-day-2015-07-12">
                                <div class="day-contents">12</div>
                            </td>
                            <td class="day calendar-day-2015-07-13">
                                <div class="day-contents">13</div>
                            </td>
                            <td class="day calendar-day-2015-07-14">
                                <div class="day-contents">14</div>
                            </td>
                            <td class="day calendar-day-2015-07-15">
                                <div class="day-contents">15</div>
                            </td>
                            <td class="day calendar-day-2015-07-16">
                                <div class="day-contents">16</div>
                            </td>
                            <td class="day calendar-day-2015-07-17">
                                <div class="day-contents">17</div>
                            </td>
                            <td class="day calendar-day-2015-07-18">
                                <div class="day-contents">18</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day calendar-day-2015-07-19">
                                <div class="day-contents">19</div>
                            </td>
                            <td class="day calendar-day-2015-07-20">
                                <div class="day-contents">20</div>
                            </td>
                            <td class="day calendar-day-2015-07-21">
                                <div class="day-contents">21</div>
                            </td>
                            <td class="day calendar-day-2015-07-22">
                                <div class="day-contents">22</div>
                            </td>
                            <td class="day calendar-day-2015-07-23">
                                <div class="day-contents">23</div>
                            </td>
                            <td class="day calendar-day-2015-07-24">
                                <div class="day-contents">24</div>
                            </td>
                            <td class="day calendar-day-2015-07-25">
                                <div class="day-contents">25</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day calendar-day-2015-07-26">
                                <div class="day-contents">26</div>
                            </td>
                            <td class="day calendar-day-2015-07-27">
                                <div class="day-contents">27</div>
                            </td>
                            <td class="day calendar-day-2015-07-28">
                                <div class="day-contents">28</div>
                            </td>
                            <td class="day calendar-day-2015-07-29">
                                <div class="day-contents">29</div>
                            </td>
                            <td class="day calendar-day-2015-07-30">
                                <div class="day-contents">30</div>
                            </td>
                            <td class="day calendar-day-2015-07-31">
                                <div class="day-contents">31</div>
                            </td>
                            <td class="day adjacent-month next-month calendar-day-2015-08-01">
                                <div class="day-contents">1</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>




<!----Calender -------->
<link rel="stylesheet" href="<?php echo base_url('assets/css/clndr.css') ?>" type="text/css" />
<script src="<?php echo base_url('assets/js/underscore-min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/moment-2.2.1.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/clndr.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/site.js') ?>" type="text/javascript"></script>
<!----End Calender -------->
</div>