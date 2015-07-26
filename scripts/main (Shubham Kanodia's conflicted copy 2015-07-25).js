$(function () {
	$('#container').highcharts({
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45,
				beta: 0
			},
			backgroundColor: '#363B4D',

		},

		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				depth: 35,
				dataLabels: {
					enabled: true,
					format: '{point.name}'
				}
			}
		},
		series: [{
			type: 'pie',
			name: 'Browser share',
			data: [
			['Firefox',   45.0],
			['IE',       26.8],
			{
				name: 'Chrome',
				y: 12.8,
				sliced: true,
				selected: true
			},
			['Safari',    8.5],
			['Opera',     6.2],
			['Others',   0.7]
			]
		}]
	});
});


$(function () {
	$('#activity-graph').highcharts({
		chart: {
			type: 'area',
			backgroundColor: '#363B4D',
		},
		xAxis: {
			allowDecimals: false,
			labels: {
				formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
        	title: {
        		text: 'Number of meetings'
        	},
        	labels: {
        		formatter: function () {
        			return this.value / 1000 + 'k';
        		}
        	},
        	gridLineColor: "rgba(255,255,255,0.1)"
        },
        tooltip: {
        	pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },
        series: [{
        	data: [null, null, null, null, null, 6, 11, 32, 110, 235, 369, 640,
        	1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
        	27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
        	26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
        	24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
        	22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
        	10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104]
        }]
    });
});