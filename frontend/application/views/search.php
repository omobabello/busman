<!---rupes -->
<div class="rupes container">
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-check-circle-o "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Search</h3>
				<h4>and Select avaliable buses</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a><i class="fa fa-3x fa-circle-o "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Enter</h3>
				<h4>User information</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-circle-o "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Make payment</h3>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-circle-o "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Print Ticket</h3>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
<!---/rupes ---->
<!--- bus-tp ---->
<div class="bus-tp">
	<div class="container">
		<p>Fare starts from : GHC. <?php echo my_min($routes) ?></p>
		<h2>Buses from <?php echo $variables['from'].' to '. $variables['to'] ?></h2>
		<div class="clearfix"></div>
	</div>
</div>

<!--- /bus-tp ---->
<!--- bus-btm ---->
<div class="bus-btm">
	<div class="container">
		<ul>
			<li class="trav"><a href="#">Name</a></li>
			<li class="dept"><a href="#">Departure</a></li>
			<li class="arriv"><a href="#">Arrival</a></li>
			<li class="seat"><a href="#">Seats</a></li>
			<li class="fare"><a href="#">Price</a></li>
				<div class="clearfix"></div>
		</ul>
	</div>
</div>
<!--- /bus-btm ---->
<!--- bus-midd ---->
<div class="bus-midd wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
	<div class="container">
	<!--- ul-first  ---->
            <?php foreach ($routes as $route) :
                        $time = intval($route->hours)." hours ".(60 * ($route->hours - intval($route->hours)))." minutes";
                 echo form_open('home/book') ?>
		<ul class="first">
			<li class="trav">
				<div class="bus-ic">
                                    <img src="<?php echo base_url('assets/images/bus.png') ?>" class="img-responsive" alt="">
				</div>
				<div class="bus-txt">
					<h4><?php echo $route->name?></h4>
				</div>
				<div class="clearfix"></div>
			</li>
			<li class="dept">
				<div class="bus-ic1">
					<i class="fa fa-clock-o"></i>
				</div>
				<div class="bus-txt1">
                                    <?php if ($variables['from'] === $route->take_off) {?>
                                            <h4><a href="#"><?php echo date("h:i A",strtotime($route->take_time))?></a></h4>
                                            <?php $variables['deptime'] = $route->take_time; ?>
                                        <?php }else{ ?>
                                            <h4><a href="#"><?php echo date("h:i A",strtotime($route->return_time))?></a></h4>
                                            <?php $variables['deptime'] = $route->return_time; ?>
                                        <?php } ?>
					<p>Duration</p>
				</div>
				<div class="clearfix"></div>
			</li>
			<li class="arriv">
				<div class="bus-txt2">
                                    <?php if($variables['from'] === $route->take_off){ ?>
                                       <h4><a href="#"><?php echo date("h:i A", strtotime("+ $time", strtotime($route->take_time)))?></a></h4>
                                  <?php  }else{ ?>
                                       <h4><a href="#"><?php echo date("h:i A", strtotime("+ $time ", strtotime($route->return_time)))?></a></h4>
                                  <?php } ?>
					<p><?php echo  $time ?></p>
				</div>
			</li>
			<li class="seat">
				<div class="bus-ic3">
                                    <img src="<?php echo base_url('assets/images/seat.png') ?>" class="img-responsive" alt="">
				</div>
				<div class="bus-txt3">
					<h4><?php echo $route->num_seat.' seats'?></h4>
				</div>
				<div class="clearfix"></div>
			</li>
			<li class="fare">
				<div class="bus-txt4">
					<h5>&#8373; <?php echo $route->price ?></h5>
                                        <?php
                                            $variables['time'] = $time;
                                            $variables['org_id'] = $route->org_id;
                                            $variables['bus_id'] = $route->bus_id;
                                            $variables['org_name'] = $route->name;
                                            $variables['departure'] = $route->take_off;
                                            $variables['price'] = $route->price;
																						$variables['route'] = $route->route;
																						$variables['dept_term'] = $route->dept_term;
																						$variables['arr_term'] = $route->arr_term;
                                            echo form_hidden('variables', $variables);
                                            echo form_submit(array('class'=>'seabtn'),"Book");
                                         ?></div>
			</li>
				<div class="clearfix"></div>
		</ul>
		<!--- /ul-first  ---->
                <?php echo form_close() ?>
            <?php endforeach; ?>
	</div>
</div>
<!--- /bus-midd ---->
