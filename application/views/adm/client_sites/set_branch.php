<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Drag and Drop Interaction Ideas | Modal</title>
		<meta name="description" content="Inspiration for drag and drop interactions for the modern UI" />
		<meta name="keywords" content="drag and drop, interaction, inspiration, web design, ui" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/tpndragdrop/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/tpndragdrop/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/tpndragdrop/modal.css" />
		<script src="<?php echo base_url();?>js/tpndragdrop/modernizr.custom.js"></script>
	</head>
	<body class="skin-3">
		<div class="container">
			<div class="content">
				<div id="grid" class="grid clearfix">
					<?php foreach($clientsites->where('branch_id',null)->get() as $cs){?>
					<div class="grid__item"><i class="fa fa-fw fa-file-archive-o"><?php echo $cs->address?></i></div>
					<?php }?>
				</div>
			</div><!-- /content -->
		</div><!-- /container -->
		<div id="drop-area" class="drop-area">
			<div class="drop-area__item"></div>
			<div class="drop-area__item"></div>
			<div class="drop-area__item"></div>
			<div class="drop-area__item"></div>
		</div>
		<div class="drop-overlay"></div>
		<script src="<?php echo base_url();?>js/tpndragdrop/draggabilly.pkgd.min.js"></script>
		<script src="<?php echo base_url();?>js/tpndragdrop/dragdrop.js"></script>
		<script>
			(function() {
				var body = document.body,
					dropArea = document.getElementById( 'drop-area' ),
					droppableArr = [], dropAreaTimeout;

				// initialize droppables
				[].slice.call( document.querySelectorAll( '#drop-area .drop-area__item' )).forEach( function( el ) {
					droppableArr.push( new Droppable( el, {
						onDrop : function( instance, draggableEl ) {
							// show checkmark inside the droppabe element
							classie.add( instance.el, 'drop-feedback' );
							clearTimeout( instance.checkmarkTimeout );
							instance.checkmarkTimeout = setTimeout( function() { 
								classie.remove( instance.el, 'drop-feedback' );
							}, 800 );
							// ...
						}
					} ) );
				} );

				// initialize draggable(s)
				[].slice.call(document.querySelectorAll( '#grid .grid__item' )).forEach( function( el ) {
					new Draggable( el, droppableArr, {
						draggabilly : { containment: document.body },
						onStart : function() {
							// add class 'drag-active' to body
							classie.add( body, 'drag-active' );
							// clear timeout: dropAreaTimeout (toggle drop area)
							clearTimeout( dropAreaTimeout );
							// show dropArea
							classie.add( dropArea, 'show' );
						},
						onEnd : function( wasDropped ) {
							var afterDropFn = function() {
								// hide dropArea
								classie.remove( dropArea, 'show' );
								// remove class 'drag-active' from body
								classie.remove( body, 'drag-active' );
							};

							if( !wasDropped ) {
								afterDropFn();
							}
							else {
								// after some time hide drop area and remove class 'drag-active' from body
								clearTimeout( dropAreaTimeout );
								dropAreaTimeout = setTimeout( afterDropFn, 400 );
							}
						}
					} );
				} );
			})();
		</script>
	</body>
</html>
