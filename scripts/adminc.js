var pData, dData;
$.get('/month.php', function(data){

	var tempData = $.parseJSON(data);
	console.log("pdata is ", tempData);
	pData = tempData[0];



	$(function () {
		$('#activity-graph').highcharts({
			chart: {
				type: 'line',
				backgroundColor: '#363B4D',
			},
			title:{
				text:"",
				style:{
					color: "white"
				}
			},
			tooltip: {
				formatter: function () {
					return this.y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' interactions held in ' +
					this.x;
				}
			},
			xAxis: {
				allowDecimals: false,
				tickColor: '#91E2F4',
				categories: ['Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				labels: {
					style: {
						color: 'rgba(255,255,255,0.8)'
					}
				}
			},
			yAxis: {
				title: {
					text: 'Interactions',
					style:{
						color:"#91E2F4"
					}
				},
				labels: {
					style: {
						color: 'rgba(255,255,255,0.6)'
					}
				},
				gridLineColor: "rgba(255,255,255,0.05)"
			},
			legend:{
				itemStyle: {
					color: 'transparent',
				}
			},
			series: [{
				data: [ parseInt(pData['01']), parseInt(pData['02']), parseInt(pData['03']),
				parseInt(pData['04']), parseInt(pData['05']), parseInt(pData['06']), parseInt(pData['07']), parseInt(pData['08']), parseInt(pData['09']), parseInt(pData['10']), parseInt(pData['11']), parseInt(pData['12'])]
			}]
		});
});

});

$.get('/dashboard.php', function(data){

	var tempData = $.parseJSON(data);
	console.log(tempData);
	dData = tempData;
	dData = dData[0];

	$('#men-num').text(dData["mencount"]);
	$('#men-free').text(dData["menfree"]);
	$('#req-pend').text(dData["pending"]);

});

