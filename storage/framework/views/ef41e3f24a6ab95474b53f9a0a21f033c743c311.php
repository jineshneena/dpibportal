<?php $__env->startSection('headtitle'); ?>
Dashboard
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
  <div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Customers</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    <div class="ml-auto">
                        <h2 class="text-success"><i class="ti-arrow-up"></i> <span class="counter"><?php echo e($dashboardDetails['customerCount']); ?></span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Claims</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    <div class="ml-auto">
                        <h2 class="text-purple"><i class="ti-arrow-up"></i> <span class="counter"><?php echo e($dashboardDetails['claimCount']); ?></span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Policies</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    <div class="ml-auto">
                        <h2 class="text-info"><i class="ti-arrow-up"></i> <span class="counter"><?php echo e($dashboardDetails['policyCount']); ?></span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Production</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div id="sparklinedash4"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    <div class="ml-auto">
                        <h2 class="text-danger"><i class="ti-arrow-up"></i> <span class="counter"><?php echo e(number_format($dashboardDetails['policySum'], 0, '.', ',')); ?></span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    
</div>   





<div class="row">          
   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Production Report - <?php echo e(date('Y')); ?></h4>
                                <div id="monthly-bar-chart" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
</div>


<div class="row">          
   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Yearly Production Report</h4>
                                <div id="yearly-bar-chart" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
</div>

<div class="row">          
   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Complaint  Report - <?php echo e(date('Y')); ?></h4>
                                <div id="complaint-monthly-bar-chart" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
</div>

<div class="row">          
   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Claim  Report - <?php echo e(date('Y')); ?></h4>
                                <div id="claim-monthly-bar-chart" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
</div>






<?php $__env->stopSection(); ?>



<?php $__env->startSection('customscript'); ?>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo e(asset('elitedesign/dist/js/perfect-scrollbar.jquery.min.js')); ?>"></script>



<script src="<?php echo e(asset('elitedesign/assets/node_modules/skycons/skycons.js')); ?>"></script>
<script src="<?php echo e(asset('js/dibcustom/dib_dashboard.js')); ?>"></script>

<?php $__env->stopSection(); ?>






<?php $__env->startSection('pagescript'); ?>
 <script src="<?php echo e(asset('elitedesign/assets/node_modules/echarts/echarts-all.js')); ?>"></script>
<script>


$(function () {
var policyMonthwise =<?php echo $policyMonthlywise; ?>;
var endorsementMonthwise = <?php echo $endorsementMonthlywise; ?>;
var policyYearlywise = <?php echo $policyYearlywise; ?>;
var endorsementYearlywise = <?php echo $endorsementYearlywise; ?>;
var complaintCountMonthlywise = <?php echo $complaintMonthly; ?>;
var claimCountMonthlywise = <?php echo $claimMonthly; ?>


    var monthlyChart = echarts.init(document.getElementById('monthly-bar-chart'));

// specify chart configuration item and data
    monthlyOption = {
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Policies', 'Endorsements']
        },
        toolbox: {
            show: true,
            feature: {

                magicType: {show: true, type: ['line', 'bar']},
                restore: {show: true},
                saveAsImage: {show: true}
            }
        },
        color: ["#55ce63", "#009efb"],
        calculable: true,
        xAxis: [
            {
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Policies',
                type: 'bar',
                data: _.toArray(policyMonthwise),
               
            },
            {
                name: 'Endorsements',
                type: 'bar',
                data: _.toArray(endorsementMonthwise) 
               
            }
            
        ]
    };
    
   
   
   var yearlyChart = echarts.init(document.getElementById('yearly-bar-chart'));

// specify chart configuration item and data
    yearlyOption = {
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Policies', 'Endorsements']
        },
        toolbox: {
            show: true,
            feature: {

                magicType: {show: true, type: ['line', 'bar']},
                restore: {show: true},
                saveAsImage: {show: true}
            }
        },
        color: ["#55ce63", "#009efb"],
        calculable: true,
        xAxis: [
            {
                type: 'category',
                data: ['2015', '2016', '2017', '2018', '2019', '2020', '2021']
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Policies',
                type: 'bar',
                data: _.toArray(policyYearlywise),
               
            },
            {
                name: 'Endorsements',
                type: 'bar',
                data: _.toArray(endorsementYearlywise)
               
            }
            
        ]
    };
    
    
    var complaintChart = echarts.init(document.getElementById('complaint-monthly-bar-chart'));

// specify chart configuration item and data
    complaintmonthlyOption = {
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Complaints']
        },
        toolbox: {
            show: true,
            feature: {

                magicType: {show: true, type: ['line', 'bar']},
                restore: {show: true},
                saveAsImage: {show: true}
            }
        },
        color: ["#fb9678"],
        calculable: true,
        xAxis: [
            {
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Count',
                type: 'line',
                data: _.toArray(complaintCountMonthlywise),
               
            }
            
        ]
    };
   
   
   var claimChart = echarts.init(document.getElementById('claim-monthly-bar-chart'));

// specify chart configuration item and data
   claimmonthlyOption = {
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Claims']
        },
        toolbox: {
            show: true,
            feature: {

                magicType: {show: true, type: ['line', 'bar']},
                restore: {show: true},
                saveAsImage: {show: true}
            }
        },
        color: ["#fb9678"],
        calculable: true,
        xAxis: [
            {
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Count',
                type: 'bar',
                data: _.toArray(claimCountMonthlywise),
               
            }
            
        ]
    };
        


// use configuration item and data specified to show chart
    monthlyChart.setOption(monthlyOption, true), $(function () {
        function resize() {
            setTimeout(function () {
                monthlyChart.resize()
            }, 100)
        }
        $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
    });
    
      yearlyChart.setOption(yearlyOption, true), $(function () {
        function resize() {
            setTimeout(function () {
                yearlyChart.resize()
            }, 100)
        }
        $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
    });
    
    
    
    
      complaintChart.setOption(complaintmonthlyOption, true), $(function () {
        function resize() {
            setTimeout(function () {
                complaintChart.resize()
            }, 100)
        }
        $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
    });
    
    
        claimChart.setOption(claimmonthlyOption, true), $(function () {
        function resize() {
            setTimeout(function () {
                claimChart.resize()
            }, 100)
        }
        $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
    });

});





</script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.elite',['notificationCount'=>0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Management/policygraph.blade.php ENDPATH**/ ?>