function onClickTreeNode(event, treeId, treeNode, clickFlag)
{ 
	$("#treeNodeId").text(treeNode.name + ": 编号" + treeNode.id);

	$.ajax({
		url: "../src/getNodeInfo.php",
		type: "POST",
		data: { name: treeNode.name},
		dataType: "json",
		error: function () {
			alert(treeNode.name + " 的数据请求失败!请联系管理员");
		},
		success: function (data) {
		    //alert(data.id);
			var currPage = $("#introduceIframe").attr("src");
			if(treeNode.id==0 && currPage!= "../src/home.html")
			{
			    $("#introduceIframe").attr("src", "../src/home.html");
			}
			else if(treeNode.id>0 && currPage!="../src/infomation.html")
			{
			    $("#introduceIframe").attr("src", "../src/infomation.html");
			}
			if(treeNode.id > 0)
			{
				onUpdatePageInfo(data);
			}
		},
        error: function () {
			alert(treeNode.name + " 的数据请求失败!请联系管理员");
		}
	})
}


function onUpdatePageInfo(data)
{
	$("#introduceIframe").contents().find("#_info_name").attr("value",data.name);
	$("#introduceIframe").contents().find("#_info_generation").attr("value", data.generation);
	$("#introduceIframe").contents().find("#_info_courtesy").attr("value", data.courtesy);
	$("#introduceIframe").contents().find("#_info_penname").attr("value", data.penname);
	$("#introduceIframe").contents().find("#_info_evername").attr("value", data.ervername);
	$("#introduceIframe").contents().find("#_info_idnum").attr("value", data.idnum);
	$("#introduceIframe").contents().find("#_info_people").attr("value", data.people);
	$("#introduceIframe").contents().find("#_info_phione").attr("value", data.phione);
	$("#introduceIframe").contents().find("#_info_email").attr("value", data.email);
	$("#introduceIframe").contents().find("#_info_country").attr("value", data.country);
	$("#introduceIframe").contents().find("#_info_state").attr("value", data.state == 1 ? "在世" : "已故");
	var ranks= new Array("长","次","三","四","五","六","七","八","九");
	$("#introduceIframe").contents().find("#_info_rank").attr("value", ranks[data.rank - 1] + (data.sex == 0 ? "子" : "女"));
	$("#introduceIframe").contents().find("#_info_name").attr("value", data.name);
	$("#introduceIframe").contents().find("#_info_image").attr("src", "../img/portrait/" + (data.image == 1 ? data.name : (data.sex == 0 ? "man" : "woman")) + ".png");
	$("#introduceIframe").contents().find("#_info_birthday").attr("value", data.birthday);
	$("#introduceIframe").contents().find("#_info_birthaddr").attr("value", data.birthaddr);
	if(data.state == 1)
	{
	    $("#introduceIframe").contents().find("#_tab_dead").hide("fast");
	    var end = new Date();
	    var start = new Date(data.birthday);
	    $("#introduceIframe").contents().find("#_info_age").attr("value", end.getFullYear() - start.getFullYear());
	}
	else
	{
	    $("#introduceIframe").contents().find("#_tab_dead").show("fast");
	    $("#introduceIframe").contents().find("#_info_deadday").attr("value", data.deadday);
	    $("#introduceIframe").contents().find("#_info_deadaddr").attr("value", data.deadaddr);
	    end = new Date(data.deadday);
	    start = new Date(data.birthday);
	    $("#introduceIframe").contents().find("#_info_age").attr("value", end.getFullYear() - start.getFullYear());
	}
}

function getTreeNodes()
{
	var treeNodes;
	$.ajax({
	    url: "getTreeNodes.php",
	    type: "get",
	    async: false,
	    dataType: "json",
	    success: function (data) {
            //alert(data);
	        treeNodes = data;
	    },
	    error: function () {
	        alert("世系图数据请求失败!请联系管理员");
	    }
	});
	return treeNodes;
}

function onAskForEdit()
{
    var ele = $("#introduceIframe").contents().find(":input");
    if(ele.attr("disabled") == true)
    {
        ele.attr("disabled", false);
    }
    else
    {
        ele.attr("disabled", true);
    }
}