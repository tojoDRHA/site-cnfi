Highcharts.chart('pieChart3', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Evolution du taux de pénétration des ménages en microfinance'
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
	]
  },
  yAxis: {
    title: {
      text: ''
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: false
    }
  },
  series: [{
    name: 'Taux de pénétration',
	data: [16.1,17.5,19.5,22.7,24.6,28.1,29.6,31.6,33.4,35.2,36.8]

  }],	  
  colors: ['#cab038', '#60ab57',  '#FF0000', '#FFC0CB', '#00FF00'],
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
