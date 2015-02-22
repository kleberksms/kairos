$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            periodo: '0 Q00',
            planejado: 90,
            atual: 90,
            expectativa: 90
        }, {
            periodo: '1 Q01',
            planejado: 80,
            atual: 83,
            expectativa: 81
        }, {
            periodo: '2 Q02',
            planejado: 70,
            atual: 75,
            expectativa: 72
        }, {
            periodo: '3 Q03',
            planejado: 60,
            atual: 53,
            expectativa: 63
        }, {
            periodo: '4 Q04',
            planejado: 50,
            atual: 50,
            expectativa: 54
        }, {
            periodo: '5 Q05',
            planejado: 40,
            atual: 41,
            expectativa: 45
        }, {
            periodo: '6 Q06',
            planejado: 30,
            atual: 36,
            expectativa: 36
        }, {
            periodo: '7 Q07',
            planejado: 20,
            atual: 35,
            expectativa: 27
        }, {
            periodo: '8 Q08',
            planejado: 10,
            atual: 23,
            expectativa: 18
        }, {
            periodo: '9 Q09',
            planejado: 00,
            atual: 09,
            expectativa: 09
        }],
        xkey: 'periodo',
        ykeys: ['planejado', 'atual', 'expectativa'],
        labels: ['planejado', 'atual', 'expectativa'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
