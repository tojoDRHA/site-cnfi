Highcharts.chart('pieChart5', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45
    }
  },
  title: {
    text: 'Part de marché des différentes catégories d\'établissements de crédit en termes d\'encours de crédit  '
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    pie: {
      innerSize: 100,
      depth: 45
    }
  },
  tooltip: {
	format: '<b>{point.name}</b>: {point.percentage:.1f} %',
  },
  series: [{
    name: '',
    data: [
      ['IMF', 44.52],
      ['Autres catégories d\'EC', 55.48]
    ]
  }]
});