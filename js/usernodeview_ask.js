$(function () {
    var cy = cytoscape({
        container: document.getElementById('cy'),
        ready:function(){
            console.log("App Ready");
        },
        elements:{
            nodes:[
                {data:{id:"sisca"}},
                {data:{id:"jami"}},
                {data:{id:"ketut"}}
            ],
            edges:[
                {data:{id:"e1",source:"sisca",target:"ketut"}},
                {data:{id:"e2",source:"sisca",target:"jami"}}
            ]
        },
        zoom:10,
        pan:{x:0,y:0},
        layout:{
            name:"breadthfirst"
        },
        style:cytoscape.stylesheet()
            .selector('node')
            .css({
                "content":"data(id)",
                "background-image": 'url(http://database.padinet.com/media/users/data(id).jpg)',
                "background-fit": "cover"
            })
        });
});
