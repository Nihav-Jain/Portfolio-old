var menuList = [];
var listHtml = [];

function getMenuTree (parentid) {
	showLoader();
	$.getJSON("php/getMenuTree.php").done(function(json){
		BFS(json[0]);
		updateView(parentid);
	});
}

function BFS(root){
	var queue = [root];
	var prev = null;
	var parentData = [];
	while(queue.length != 0){
		var i;
		var cur = queue[0];
		listHtml[cur.id] = "";

		if(cur.children.length == 0){
			listHtml[cur.id] = listHtml[cur.parent_id];
			queue.shift();
			continue;
		}

		parentData[cur.id] = {menu_name: cur.menu_name, menu_alias: cur.menu_alias};
		listHtml[cur.id] = "<ul>";
		if(cur.id != 0){
			listHtml[cur.id] += "<li><a href=\"#\" data-id=\"" + cur.id + "\"><span class=\"" + cur.menu_icon + "\">" + cur.menu_name + "</span></a></li>";
			listHtml[cur.id] += "<li><a href=\"#\" id=\"back\" data-alias=\"" + parentData[cur.parent_id].menu_alias + "\" data-name=\"" + parentData[cur.parent_id].menu_name + "\" data-id=\"" + cur.parent_id + "\"class=\"skel-panels-ignoreHref\"><span>Back</span></a></li>";
		}

		for(i=0;i<cur.children.length;i++)
		{
			queue.push(cur.children[i][0]);
			listHtml[cur.id] += "<li>";
			listHtml[cur.id] += "<a href=\"#\" id=\"" + cur.children[i][0].menu_alias + "\" data-alias=\"" + cur.children[i][0].menu_alias + "\" data-name=\"" + cur.children[i][0].menu_name + "\" data-id=\"" + cur.children[i][0].id + "\" class=\"skel-panels-ignoreHref\"><span class=\"" + cur.children[i][0].menu_icon + "\">" + cur.children[i][0].menu_name + "</span></a>";
			listHtml[cur.id] += "</li>";
		}
		listHtml[cur.id] += "</ul>";
		prev = cur;
		queue.shift();
	}
}

function addClickListener()
{
	$('.skel-panels-ignoreHref').click(function(){
		showLoader();
		$('.skel-panels-ignoreHref').removeClass('active');
		$(this).addClass('active');
		
		var title = $(this).data('name') + " | Nihav Jain";
		document.title = title;
		history.pushState({id: $(this).data('id'), name: title}, '', $(this).data('alias'));
		updateView($(this).data('id'));
		return false;
	});
}

$(window).on("popstate", function () {
  if (history.state) {
    var menuid = history.state.id;
    var titlename = history.state.name;
    if(titlename && titlename.indexOf("Nihav Jain") >= 0)
    {
	    document.title = history.state.name;
	    updateView(menuid);
    }
    else
	loadPage(location.href);
  }
});

function updateView(id){
	//if(listHtml[id].length > 0)
	document.getElementById('nav').innerHTML = listHtml[id];
	getMenuDesc(id);
	addClickListener();
}

function getMenuDesc(menuid)
{
	//console.log(menuid);
	$.getJSON("php/getMenuDesc.php?menuid=" + menuid).done(function(json){
		//console.log(json[0].menu_desc);
		if(json.length == 0)
		{
			//no child
			return;
		}
		var i = 0;
		var desc = "";//"<section id=\"" + json[0].menu_alias + "\" class=\"two\">";
		desc += "<div class=\"container\">";
		desc += json[0].menu_desc;
		desc += "</div>";

		document.getElementById('content').innerHTML = desc;
		hideLoader();
		if(desc.indexOf('galleria') >= 0){
		Galleria.loadTheme('js/galleria/themes/classic/galleria.classic.min.js');
		Galleria.run('.galleria', {
		    theme: 'classic',
		    imageCrop: false,
		    transition: 'fade'
		});
		}
	});
}

function showLoader(){
	console.log("showLoader");
	$('#content').hide();
	$('#loader').show();
	window.scrollTo(0,0);
}

function hideLoader(){
	console.log("hideLoader");
	$('#loader').hide();
	$('#content').show();
	window.scrollTo(0,0);
}
