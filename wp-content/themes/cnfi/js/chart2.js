Highcharts.chart('pieChart2', {
  chart: {
	type: 'column'
  },
  title: {
	text: 'Evolution du nombre de membres et/ou clients'
  },
  subtitle: {
	text: 'Source: CNFI'
  },
  xAxis: {
	categories: [
	  '2009',  
	  '2010',
	  '2011',
	  '2012',
	  '2013',
	  '2014',
	  '2015',
	  '2016',
	  '2017',
	  '2018',
	  '2019'
	],
	crosshair: true
  },
  yAxis: {
	min: 0,
	title: {
	  text: ''
	}
  },
  tooltip: {
	headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
	footerFormat: '</table>',
	shared: true,
	useHTML: true
  },
  plotOptions: {
	column: {
		  stacking: 'normal'
		}
  },
  series: [
  {
	name: 'Autres catégories d\'EC',
	data: [591632,680895,750572,838008,865659,946592,1013080,1075550,1144528,1207013,1306789]

  },	  
  {
	name: 'IMF',
	data: [47344,67378,109466,151640,232416,341836,382788,453191,517415,552246,600960]

  }],
  colors: ['#5f308a', '#60ab57',  '#FF0000', '#FFC0CB', '#00FF00'],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 600
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        }
      }
    }]
  },
   exporting: {
		showTable: false
  }
});