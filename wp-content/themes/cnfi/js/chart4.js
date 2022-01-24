Highcharts.chart('pieChart4', {
  chart: {
	type: 'column'
  },
  title: {
	text: 'Evolution de l\’encours de crédit du secteur de la microfinance'
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
	data: [40536,62173,88437,117763,151594,204752,253326,317688,448352,528538,538661]

  },
  {
	name: 'IMF',
	data: [104638,115695,158488,197027,236088,239392,253620,282069,327850,362238,432279]

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