(function($){
    console.log("Document Ready");
    vstyle = cytoscape.stylesheet()
            .selector('node')
            .css({
                'height': 80,
                'width': 80,
                'background-fit': 'cover',
                'border-color': '#000',
                'border-width': 3,
                'border-opacity': 0.5
            })
            .selector('edge')
            .css({
                'width': 6,
                'target-arrow-shape': 'triangle',
                'line-color': '#ffaaaa',
                'target-arrow-color': '#ffaaaa'
            })

    var cy = $('#cy').cytoscape({
        ready:function(){
            console.log("Cytoscape ready");
        },
        style:vstyle,
        layout:{
            name:"breadthfirst",
            fit:true,
            directed:true,
            padding:10
        },
        elements:{
            nodes:vnodes,
            edges:vedges
        }
    }).css({background:"red"});
    
    var vnodes = [
    ];
    var vedges = [
    ]
    $.ajax({
        url: thisdomain + "users/userJson",
        dataType: "json"
    }).done(function (data) {
        $.each(data, function (x, y) {
            console.log(y["id"]);
            console.log(y["source"]);
            $(this).addNode({
                id: y["id"],
                target: "",
                source: y["source"]
            })
        })
    });

    $.fn.addNode = function (options) {
        var settings = $.extend({
            id: "",
            target: "",
            source: "",
            x:10,y:10
        }, options)
        cy.add([{
                data: {id: settings.id},
                position: {x: settings.x, y: settings.y},
                group: "nodes"
            }
        ])
                .css({
                    "background-image": thisdomain + 'media/users/' + settings.id,
                    "content": settings.id
                });
        if (settings.target != "") {
            cy.add([
                {
                    data: {id: settings.id + 'edge_out', source: settings.id, target: settings.target},
                    group: "edges"
                }
            ]);
        }
        if (settings.source != "") {
            cy.add([
                {
                    data: {id: settings.id + 'edge_in', source: settings.source, target: settings.id},
                    group: "edges"
                }
            ]);
        }

    };

}(jQuery));