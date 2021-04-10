@extends('frontend.main')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Admin Dashboard</a>
  </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-panel-toggler">
  <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
</div>
<div class="content-i">
  <div class="content-box">
    <div class="row">
      <div class="col-sm-12">
        <div class="element-wrapper">
          <h6 class="element-header">
            Admin Dashboard
          </h6>
            <!--START - CHART-->
            <div class="element-wrapper">
              <div class="element-box">
                <div class="element-actions">
                  <div class="form-group">
                    <select class="form-control form-control-sm" name="revenue">
                      <option selected="true" value="commissioned">
                        Commissioned
                      </option>
                      <option value="non-commissioned">
                        Non-Commissioned
                      </option>
                    </select>
                  </div>
                </div>
                <h5 class="element-box-header">
                  Revenue
                </h5>
                <div class="el-chart-w">
                  <canvas height="90" id="liteLineChartV211" width="300"></canvas>
                </div>
              </div>
            </div>     


            <div class="element-wrapper">
              <div class="element-box">
                <div class="element-actions">
                  <div class="form-group">
                    <select class="form-control form-control-sm" name="systems">
                      <option selected="true" value="commissioned">
                        Commissioned
                      </option>
                      <option value="non-commissioned">
                        Non-Commissioned
                      </option>
                    </select>
                  </div>
                </div>
                <h5 class="element-box-header">
                  Systems
                </h5>
                <div class="el-chart-w">
                  <canvas height="90" id="liteLineChartV21" width="300"></canvas>
                </div>
              </div>
            </div>               

            <div class="element-wrapper">
              <div class="element-box">
                <div class="element-actions">
                  <div class="form-group">
                    <select class="form-control form-control-sm" name="system-size">
                      <option selected="true" value="commissioned">
                        Commissioned
                      </option>
                      <option value="non-commissioned">
                        Non-Commissioned
                      </option>
                    </select>
                  </div>
                </div>
                <h5 class="element-box-header">
                  System Size (kW)
                </h5>
                <div class="el-chart-w">
                  <canvas height="90" id="liteLineChartV22" width="300"></canvas>
                </div>
              </div>
            </div>               

            <div class="element-wrapper">
              <div class="element-box">
                <div class="element-actions">
                  <div class="form-group">
                    <select class="form-control form-control-sm" name="potential-carbon-savings">
                      <option selected="true" value="commissioned">
                        Commissioned
                      </option>
                      <option value="non-commissioned">
                        Non-Commissioned
                      </option>
                    </select>
                  </div>
                </div>
                <h5 class="element-box-header">
                  Potential Carbon Savings
                </h5>
                <div class="el-chart-w">
                  <canvas  height="90" id="liteLineChartV23" width="300"></canvas>
                </div>
              </div>
            </div>

            <div class="element-wrapper">
              <div class="element-box">
                <h5 class="element-box-header">
                  Number Of Queries
                </h5>
                <div class="el-chart-w">
                  <canvas height="90" id="liteLineChartV24" width="300"></canvas>
                </div>
              </div>
            </div>

			<script src="{{ asset('public/dist/bower_components/jquery/dist/jquery.min.js') }}"></script>
			<script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					type: 'POST',
					url: "<?php echo url('api/getrevenue') ?>",  
					dataType: 'json',
					data: {type:'commissioned'},
					success: function (data)
					{
						var olddata = data.data;
						var max = data.max;
						var liteLineChartV211 = $("#liteLineChartV211");
						var liteLineGradientV211 = liteLineChartV211[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
						liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
						liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

						var ctx = document.getElementById('liteLineChartV211').getContext('2d');
						var chart = new Chart(ctx, {
							type: 'line',
							data: {
								labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
								datasets: [{
									label: "Revenue",
									fill: true,
									lineTension: 0.35,
									backgroundColor: liteLineGradientV211,
									borderColor: "#2861f5",
									borderCapStyle: 'butt',
									borderDash: [],
									borderDashOffset: 0.0,
									borderJoinStyle: 'miter',
									pointBorderColor: "#2861f5",
									pointBackgroundColor: "#fff",
									pointBorderWidth: 2,
									pointHoverRadius: 3,
									pointHoverBackgroundColor: "#FC2055",
									pointHoverBorderColor: "#fff",
									pointHoverBorderWidth: 2,
									pointRadius: 3,
									pointHitRadius: 10,
									data: olddata,
									spanGaps: false
								}]
							},
							options: {
								legend: {
									display: false
								},
								scales: {
									xAxes: [{
										ticks: {
											fontSize: '10',
											fontColor: '#969da5'
										},
										gridLines: {
											color: 'rgba(0,0,0,0.0)',
											zeroLineColor: 'rgba(0,0,0,0.0)'
										}
									}],
									yAxes: [{
										display: false,
										ticks: {
											beginAtZero: true,
											max: max
										}
									}]
								}
							}
						});
					}
				});
				
				$.ajax({
					type: 'POST',
					url: "<?php echo url('api/getsystems') ?>",  
					dataType: 'json',
					data: {type:'commissioned'},
					success: function (data)
					{
						var olddata = data.data;
						var max = data.max;
						var liteLineChartV21 = $("#liteLineChartV21");
						var liteLineGradientV211 = liteLineChartV21[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
						liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
						liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

						var ctx = document.getElementById('liteLineChartV21').getContext('2d');
						var chart = new Chart(ctx, {
							type: 'line',
							data: {
								labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
								datasets: [{
									label: "Systems",
									fill: true,
									lineTension: 0.35,
									backgroundColor: liteLineChartV21,
									borderColor: "#2861f5",
									borderCapStyle: 'butt',
									borderDash: [],
									borderDashOffset: 0.0,
									borderJoinStyle: 'miter',
									pointBorderColor: "#2861f5",
									pointBackgroundColor: "#fff",
									pointBorderWidth: 2,
									pointHoverRadius: 3,
									pointHoverBackgroundColor: "#FC2055",
									pointHoverBorderColor: "#fff",
									pointHoverBorderWidth: 2,
									pointRadius: 3,
									pointHitRadius: 10,
									data: olddata,
									spanGaps: false
								}]
							},
							options: {
								legend: {
									display: false
								},
								scales: {
									xAxes: [{
										ticks: {
											fontSize: '10',
											fontColor: '#969da5'
										},
										gridLines: {
											color: 'rgba(0,0,0,0.0)',
											zeroLineColor: 'rgba(0,0,0,0.0)'
										}
									}],
									yAxes: [{
										display: false,
										ticks: {
											beginAtZero: true,
											max: max
										}
									}]
								}
							}
						});
					}
				});
				
				$.ajax({
					type: 'POST',
					url: "<?php echo url('api/getsystemssize') ?>",  
					dataType: 'json',
					data: {type:'commissioned'},
					success: function (data)
					{
						var olddata = data.data;
						var max = data.max;
						var liteLineChartV22 = $("#liteLineChartV22");
						var liteLineGradientV211 = liteLineChartV22[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
						liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
						liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

						var ctx = document.getElementById('liteLineChartV22').getContext('2d');
						var chart = new Chart(ctx, {
							type: 'line',
							data: {
								labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
								datasets: [{
									label: "Systems Size",
									fill: true,
									lineTension: 0.35,
									backgroundColor: liteLineChartV22,
									borderColor: "#2861f5",
									borderCapStyle: 'butt',
									borderDash: [],
									borderDashOffset: 0.0,
									borderJoinStyle: 'miter',
									pointBorderColor: "#2861f5",
									pointBackgroundColor: "#fff",
									pointBorderWidth: 2,
									pointHoverRadius: 3,
									pointHoverBackgroundColor: "#FC2055",
									pointHoverBorderColor: "#fff",
									pointHoverBorderWidth: 2,
									pointRadius: 3,
									pointHitRadius: 10,
									data: olddata,
									spanGaps: false
								}]
							},
							options: {
								legend: {
									display: false
								},
								scales: {
									xAxes: [{
										ticks: {
											fontSize: '10',
											fontColor: '#969da5'
										},
										gridLines: {
											color: 'rgba(0,0,0,0.0)',
											zeroLineColor: 'rgba(0,0,0,0.0)'
										}
									}],
									yAxes: [{
										display: false,
										ticks: {
											beginAtZero: true,
											max: max
										}
									}]
								}
							}
						});
					}
				});
				
				$.ajax({
					type: 'POST',
					url: "<?php echo url('api/getpotentialcarbonsavings') ?>",  
					dataType: 'json',
					data: {type:'commissioned'},
					success: function (data)
					{
						var olddata = data.data;
						var max = data.max;
						var liteLineChartV23 = $("#liteLineChartV23");
						var liteLineGradientV211 = liteLineChartV23[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
						liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
						liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

						var ctx = document.getElementById('liteLineChartV23').getContext('2d');
						var chart = new Chart(ctx, {
							type: 'line',
							data: {
								labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
								datasets: [{
									label: "Count",
									fill: true,
									lineTension: 0.35,
									backgroundColor: liteLineChartV23,
									borderColor: "#2861f5",
									borderCapStyle: 'butt',
									borderDash: [],
									borderDashOffset: 0.0,
									borderJoinStyle: 'miter',
									pointBorderColor: "#2861f5",
									pointBackgroundColor: "#fff",
									pointBorderWidth: 2,
									pointHoverRadius: 3,
									pointHoverBackgroundColor: "#FC2055",
									pointHoverBorderColor: "#fff",
									pointHoverBorderWidth: 2,
									pointRadius: 3,
									pointHitRadius: 10,
									data: olddata,
									spanGaps: false
								}]
							},
							options: {
								legend: {
									display: false
								},
								scales: {
									xAxes: [{
										ticks: {
											fontSize: '10',
											fontColor: '#969da5'
										},
										gridLines: {
											color: 'rgba(0,0,0,0.0)',
											zeroLineColor: 'rgba(0,0,0,0.0)'
										}
									}],
									yAxes: [{
										display: false,
										ticks: {
											beginAtZero: true,
											max: max
										}
									}]
								}
							}
						});
					}
				});
				
				$.ajax({
					type: 'GET',
					url: "<?php echo url('api/getnumberofqueries') ?>",  
					dataType: 'json',
					success: function (data)
					{
						var olddata = data.data;
						var max = data.max;
						var liteLineChartV24 = $("#liteLineChartV24");
						var liteLineGradientV211 = liteLineChartV24[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
						liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
						liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

						var ctx = document.getElementById('liteLineChartV24').getContext('2d');
						var chart = new Chart(ctx, {
							type: 'line',
							data: {
								labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
								datasets: [{
									label: "Count",
									fill: true,
									lineTension: 0.35,
									backgroundColor: liteLineChartV24,
									borderColor: "#2861f5",
									borderCapStyle: 'butt',
									borderDash: [],
									borderDashOffset: 0.0,
									borderJoinStyle: 'miter',
									pointBorderColor: "#2861f5",
									pointBackgroundColor: "#fff",
									pointBorderWidth: 2,
									pointHoverRadius: 3,
									pointHoverBackgroundColor: "#FC2055",
									pointHoverBorderColor: "#fff",
									pointHoverBorderWidth: 2,
									pointRadius: 3,
									pointHitRadius: 10,
									data: olddata,
									spanGaps: false
								}]
							},
							options: {
								legend: {
									display: false
								},
								scales: {
									xAxes: [{
										ticks: {
											fontSize: '10',
											fontColor: '#969da5'
										},
										gridLines: {
											color: 'rgba(0,0,0,0.0)',
											zeroLineColor: 'rgba(0,0,0,0.0)'
										}
									}],
									yAxes: [{
										display: false,
										ticks: {
											beginAtZero: true,
											max: max
										}
									}]
								}
							}
						});
					}
				});
				
				
				$('select[name="revenue"]').on('change', function(){
					var type = $(this).val();
					$.ajax({
						type: 'POST',
						url: "<?php echo url('api/getrevenue') ?>",  
						dataType: 'json',
						data: {type:type},
						success: function (data)
						{
							var olddata = data.data;
							var max = data.max;
							var liteLineChartV211 = $("#liteLineChartV211");
							var liteLineGradientV211 = liteLineChartV211[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
							liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
							liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

							var ctx = document.getElementById('liteLineChartV211').getContext('2d');
							var chart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
									datasets: [{
										label: "Revenue",
										fill: true,
										lineTension: 0.35,
										backgroundColor: liteLineGradientV211,
										borderColor: "#2861f5",
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: "#2861f5",
										pointBackgroundColor: "#fff",
										pointBorderWidth: 2,
										pointHoverRadius: 3,
										pointHoverBackgroundColor: "#FC2055",
										pointHoverBorderColor: "#fff",
										pointHoverBorderWidth: 2,
										pointRadius: 3,
										pointHitRadius: 10,
										data: olddata,
										spanGaps: false
									}]
								},
								options: {
									legend: {
										display: false
									},
									scales: {
										xAxes: [{
											ticks: {
												fontSize: '10',
												fontColor: '#969da5'
											},
											gridLines: {
												color: 'rgba(0,0,0,0.0)',
												zeroLineColor: 'rgba(0,0,0,0.0)'
											}
										}],
										yAxes: [{
											display: false,
											ticks: {
												beginAtZero: true,
												max: max
											}
										}]
									}
								}
							});
						}
					});
				});

				$('select[name="systems"]').on('change', function(){
					var type = $(this).val();
					$.ajax({
						type: 'POST',
						url: "<?php echo url('api/getsystems') ?>",  
						dataType: 'json',
						data: {type:type},
						success: function (data)
						{
							var olddata = data.data;
							var max = data.max;
							var liteLineChartV21 = $("#liteLineChartV21");
							var liteLineGradientV211 = liteLineChartV21[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
							liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
							liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

							var ctx = document.getElementById('liteLineChartV21').getContext('2d');
							var chart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
									datasets: [{
										label: "Systems",
										fill: true,
										lineTension: 0.35,
										backgroundColor: liteLineChartV21,
										borderColor: "#2861f5",
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: "#2861f5",
										pointBackgroundColor: "#fff",
										pointBorderWidth: 2,
										pointHoverRadius: 3,
										pointHoverBackgroundColor: "#FC2055",
										pointHoverBorderColor: "#fff",
										pointHoverBorderWidth: 2,
										pointRadius: 3,
										pointHitRadius: 10,
										data: olddata,
										spanGaps: false
									}]
								},
								options: {
									legend: {
										display: false
									},
									scales: {
										xAxes: [{
											ticks: {
												fontSize: '10',
												fontColor: '#969da5'
											},
											gridLines: {
												color: 'rgba(0,0,0,0.0)',
												zeroLineColor: 'rgba(0,0,0,0.0)'
											}
										}],
										yAxes: [{
											display: false,
											ticks: {
												beginAtZero: true,
												max: max
											}
										}]
									}
								}
							});
						}
					});
				});
				
				$('select[name="system-size"]').on('change', function(){
					var type = $(this).val();
					$.ajax({
						type: 'POST',
						url: "<?php echo url('api/getsystemssize') ?>",  
						dataType: 'json',
						data: {type:type},
						success: function (data) 
						{
							var olddata = data.data;
							var max = data.max;
							var liteLineChartV22 = $("#liteLineChartV22");
							var liteLineGradientV211 = liteLineChartV22[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
							liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
							liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

							var ctx = document.getElementById('liteLineChartV22').getContext('2d');
							var chart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
									datasets: [{
										label: "Systems Size",
										fill: true,
										lineTension: 0.35,
										backgroundColor: liteLineChartV22,
										borderColor: "#2861f5",
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: "#2861f5",
										pointBackgroundColor: "#fff",
										pointBorderWidth: 2,
										pointHoverRadius: 3,
										pointHoverBackgroundColor: "#FC2055",
										pointHoverBorderColor: "#fff",
										pointHoverBorderWidth: 2,
										pointRadius: 3,
										pointHitRadius: 10,
										data: olddata,
										spanGaps: false
									}]
								},
								options: {
									legend: {
										display: false
									},
									scales: {
										xAxes: [{
											ticks: {
												fontSize: '10',
												fontColor: '#969da5'
											},
											gridLines: {
												color: 'rgba(0,0,0,0.0)',
												zeroLineColor: 'rgba(0,0,0,0.0)'
											}
										}],
										yAxes: [{
											display: false,
											ticks: {
												beginAtZero: true,
												max: max
											}
										}]
									}
								}
							});
						}
					});
				});
				$('select[name="potential-carbon-savings"]').on('change', function(){
					var type = $(this).val();
					$.ajax({
						type: 'POST',
						url: "<?php echo url('api/getpotentialcarbonsavings') ?>",  
						dataType: 'json',
						data: {type:'commissioned'},
						success: function (data)
						{
							var olddata = data.data;
							var max = data.max;
							var liteLineChartV23 = $("#liteLineChartV23");
							var liteLineGradientV211 = liteLineChartV23[0].getContext('2d').createLinearGradient(0, 0, 0, 100);
							liteLineGradientV211.addColorStop(0, 'rgba(40,97,245,0.1)');
							liteLineGradientV211.addColorStop(1, 'rgba(40,97,245,0)');

							var ctx = document.getElementById('liteLineChartV23').getContext('2d');
							var chart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ["7 Days Ago", "6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "Yesterday", "Today"],
									datasets: [{
										label: "Count",
										fill: true,
										lineTension: 0.35,
										backgroundColor: liteLineChartV23,
										borderColor: "#2861f5",
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: "#2861f5",
										pointBackgroundColor: "#fff",
										pointBorderWidth: 2,
										pointHoverRadius: 3,
										pointHoverBackgroundColor: "#FC2055",
										pointHoverBorderColor: "#fff",
										pointHoverBorderWidth: 2,
										pointRadius: 3,
										pointHitRadius: 10,
										data: olddata,
										spanGaps: false
									}]
								},
								options: {
									legend: {
										display: false
									},
									scales: {
										xAxes: [{
											ticks: {
												fontSize: '10',
												fontColor: '#969da5'
											},
											gridLines: {
												color: 'rgba(0,0,0,0.0)',
												zeroLineColor: 'rgba(0,0,0,0.0)'
											}
										}],
										yAxes: [{
											display: false,
											ticks: {
												beginAtZero: true,
												max: max
											}
										}]
									}
								}
							});
						}
					});
				});
			});

         </script>      
        </div>
      </div>
    </div>
  </div>
</div>
@endsection