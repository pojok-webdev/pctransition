/* url lib
 * WRITTEN BY PUJI W PRAYITNO
 * 2014-2015
 * mailto:puji@padi.net.id
 * */
function openInNewTab(url){
	newTab = window.open(url,'_blank');
	newTab.focus();
}
function urlsegment(n){
	var segments = window.location.pathname.split( '/' );;
	return segments[n];
}
