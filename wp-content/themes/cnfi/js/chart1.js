
Highcharts.chart('pieChart1', {
  chart: {
	type: 'column'
  },
  title: {
	text: 'Evolution du nombre de caisses par points de services'
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
	  pointPadding: 0,
	  borderWidth: 0
	}
  },
  series: [
  {
	name: 'Autres catégories d\'EC',
	data: [16,20,33,41,50,76,82,87,93,96,96]

  },	  
  {
	name: 'IMF',
	data: [636,680,706,743,770,814,855,882,899,923,938]

  }],
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
