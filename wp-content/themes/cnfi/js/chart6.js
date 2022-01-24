Highcharts.chart('pieChart6', {
  chart: {
	type: 'column'
  },
  title: {
	text: 'Evolution de l’encours d’épargne du secteur microfinance'
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
	data: [21304,50461,74873,82027,117766,172203,247563,289933,462486,503510,513491]

  },
  {
	name: 'IMF',
	data: [69700,85983,120619,151503,191667,209979,239899,300357,318991,391033,390676]

  }],
  colors: ['#60ab57', '#5f308a'],
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