<?php 
		
		$year=date('Y');
		$month=date('m');
		$db=$this->load->database('default', TRUE);
		$qtopitem=$db->query("
		SELECT 
		a.vcItemCode, a.`vcItemName`,
		SUM(a.`intQtyInv`) AS QtyInv,
		a.`vcUoMInv`, c.`blpImage`
		FROM dAR a
		LEFT JOIN hAR b ON a.`intHID`=b.`intID`
		LEFT JOIN mitem c ON a.`intItem`=c.intID
		WHERE MONTH(b.`dtDate`)=$month AND YEAR(b.`dtDate`)=$year
		GROUP BY a.vcItemCode
		ORDER BY SUM(a.`intQtyInv`) DESC
		LIMIT 0,4
		");
		
		
		$monthnow = date('n');
		if($monthnow==1)
		{
			$monthprev=12;
		}
		else
		{
			$monthprev= $monthnow-1;
		}
		for($h=1;$h<=12;$h++)
		{
			$kep4[$h] = 0;
			$kep5[$h] = 0;
			$kep6[$h] = 0;
			if($monthprev==12 and $h==12)
			{
				$dtlst=date('Y')-1;
				$d['from'] = $dtlst."-".str_pad($h, 2, "0", STR_PAD_LEFT)."-01";
				$d['until'] = $dtlst."-".str_pad($h, 2, "0", STR_PAD_LEFT)."-31";
			}
			else
			{
				$d['from'] = date('Y')."-".str_pad($h, 2, "0", STR_PAD_LEFT)."-01";
				$d['until'] = date('Y')."-".str_pad($h, 2, "0", STR_PAD_LEFT)."-31";
			}
			$d['plan'] = 0;
			$pnl[$h] = $this->m_report->GetPNL1($d);
			if($h==9){
				//echo $d['until'];
			}
			$kep6[$h] = 0;
			foreach($pnl[$h]->result() as $x)
			{
				if($x->GL=='4')
				{	
					$kep4[$h] = $x->Val;
				}
				else if($x->GL=='5')
				{
					$kep5[$h] = $x->Val*-1;
				}
				else if($x->GL=='6' or $x->GL=='7' or $x->GL=='8' or $x->GL=='9')
				{
					$kep6[$h] = $kep6[$h] + ($x->Val*-1);
				}
			}
		}
		$revthismonth = $kep4[$monthnow];
		$costthismonth = $kep5[$monthnow];
		$cost2thismonth = $kep6[$monthnow];
		$profitthismonth = $revthismonth - $costthismonth - $cost2thismonth;
		
		$revprevmonth = $kep4[$monthprev];
		$costprevmonth = $kep5[$monthprev];
		$cost2prevmonth = $kep6[$monthprev];
		$profitprevmonth = $revprevmonth - $costprevmonth - $cost2prevmonth;
		
		if($revprevmonth!=0){$uprev = ($revthismonth - $revprevmonth) / $revprevmonth * 100;}else{$uprev=100;}
		if($costprevmonth!=0){$upcost = ($costthismonth - $costprevmonth) / $costprevmonth * 100;}else{$upcost=100;}
		if($cost2prevmonth!=0){$upcost2 = ($cost2thismonth - $cost2prevmonth) / $cost2prevmonth * 100;}else{$upcost2=100;}
		if($profitprevmonth!=0){$uprofit = ($profitthismonth - $profitprevmonth) / $profitprevmonth * 100;}else{$uprofit=100;}
		
		
		for($i=1;$i<=12;$i++)
		{
			
			$kep10[$i] = $kep4[$i]-$kep5[$i]-$kep6[$i];
		}
		
?>	
	
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: <?php echo date('Y');?></strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                   <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                 <!-- /.box-header -->
				 <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">TOP Items (This Month)</h3>

					  
					</div>
					<div class="box-body">
					  
					  <ul class="products-list product-list-in-box">
						<?php foreach($qtopitem->result() as $ti){?>
						<li class="item">
						  <div class="product-img">
							<?php if($ti->blpImage!=null){ ?>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $ti->blpImage ).'" class="img-circle" alt="Product Image"/>'?>
							<?php }else{ ?>
							<?php echo '<img src="'.base_url().'data/general/dist/img/box.png" class="img-circle" alt="Product Image"/>'?>
							<?php }?>
						  </div>
						  <div class="product-info">
							<a href="javascript:void(0)" class="product-title"><?php echo $ti->vcItemCode;?>
							  <span class="label label-warning pull-right"><?php echo number_format($ti->QtyInv,0)." ".$ti->vcUoMInv."";?></span></a>
							<span class="product-description">
								  <?php echo $ti->vcItemName;?>
								</span>
						  </div>
						</li>
						<?php }?>
					  </ul>
					</div>
					</div>
					<!-- /.box-body -->
					
					<!-- /.box-footer -->
				  </div>
				  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-<?php if($uprev>=0){ echo 'green';}else{echo 'red';}?>"><i class="fa fa-caret-<?php if($uprev>=0){ echo 'up';}else{echo 'down';}?>"></i> <?php echo number_format($uprev,'0');?>%</span>
                    <h5 class="description-header"><?php echo 'IDR '.number_format($revthismonth,'2');?></h5>
                    <span class="description-text">REVENUE THIS MONTH</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-<?php if($upcost>=0){ echo 'red';}else{echo 'green';}?>"><i class="fa fa-caret-<?php if($upcost>=0){ echo 'up';}else{echo 'down';}?>"></i> <?php echo number_format($upcost,'0');?>%</span>
                    <h5 class="description-header"><?php echo 'IDR '.number_format($costthismonth,'2');?></h5>
                    <span class="description-text">COST OF GOODS SALES THIS MONTH</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-<?php if($upcost2>=0){ echo 'red';}else{echo 'green';}?>"><i class="fa fa-caret-<?php if($upcost2>=0){ echo 'up';}else{echo 'down';}?>"></i> <?php echo number_format($upcost2,'0');?>%</span>
                    <h5 class="description-header"><?php echo 'IDR '.number_format($cost2thismonth,'2');?></h5>
                    <span class="description-text">OPERATIONAL THIS MONTH</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-<?php if($uprofit>=0){ echo 'green';}else{echo 'red';}?>"><i class="fa fa-caret-<?php if($uprofit>=0){ echo 'up';}else{echo 'down';}?>"></i> <?php echo number_format($uprofit,'0');?>%</span>
                    <h5 class="description-header"><?php echo 'IDR '.number_format($profitthismonth,'2');?></h5>
                    <span class="description-text">PROFIT THIS MONTH</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>

Highcharts.chart('container', {

	chart: {
        type: 'area'
    },
    title: {
        text: 'Revenue vs Cost'
    },
	lang: {
      decimalPoint: '.',
      thousandsSep: ','
    },
  
    yAxis: {
        title: {
            text: 'IDR'
        },
		stackLabels: {
            enabled: true
        }
    },
	xAxis: {
            categories: [<?php for($i=1;$i<=12;$i++){ $dateObj   = DateTime::createFromFormat('!m', $i);
									$monthName = $dateObj->format('F'); echo "'".$monthName."',";}?>]
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
            series: {
                dataLabels: {
                    enabled: false
                },
                enableMouseTracking: true
            },
			column: {
            stacking: 'normal',
				dataLabels: {
					enabled: false
				}
			}
    },
	
	tooltip: {
		pointFormat: '<span style="font-size: 16px">{point.y:,.0f}</span><br/>'
	},
    series: [{
        name: 'Revenue',
		//color: 'green',
        data: [
		<?php
		
		for($i=1;$i<=12;$i++)
		{
			
			echo $kep4[$i].",";
		}
		?>
		]
    }, {
		type: 'column',
        name: 'COGS',
		//color: 'red',
        data: [
		<?php
		for($i=1;$i<=12;$i++)
		{
			
			echo $kep5[$i].",";
		}
		?>
		]
    }, {
		type: 'column',
        name: 'Operational',
		//color: 'red',
        data: [
		<?php
		for($i=1;$i<=12;$i++)
		{
			
			echo $kep6[$i].",";
		}
		?>
		]
    }, {
        name: 'Net Profit',
		//color: 'red',
        data: [
		<?php
		for($i=1;$i<=12;$i++)
		{
			
			echo $kep10[$i].",";
		}
		?>
		]
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
  

</script>