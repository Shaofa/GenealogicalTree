function onShowFloatBox()
{
	if($('#divFloatToolsView').css("display") == "none")
		$('#divFloatToolsView').show(500);
	else
		$('#divFloatToolsView').hide(500);				
}

function isPC() {
	var userAgentInfo = navigator.userAgent;
	var Agents = ["Android", "iPhone","SymbianOS", "Windows Phone","iPad", "iPod"];
	var flag = true;
	for (var v = 0; v < Agents.length; v++) {
		if (userAgentInfo.indexOf(Agents[v]) > 0) {
    		flag = false;
    		break;
		}
	}
	return flag;
}

function onShowLayer(index)
{
	if(index==0)				// Message
	{ 
		layer.open({
		    type: 2,
		    title: false,
		    shadeClose: false,
		    closeBtn: true,
		    skin: "layui-layer-lan",
		    shade: 0.5,
		    skin: "layui-layer-lan",
		    area: ['620px', '400px'],
		    content: '../src/contact/message.html'
		});
	}
	else if(index==1)			// QQ
	{ 
		if(isPC())
		{ 
			$("#aQQ").attr("href","tencent://message/?uin=1278230143&Site=&menu=yes");
		}
	}
	else if(index==2)			// WeChat
	{ 
		layer.open({
		    type: 2,
		    title: false,
		    shadeClose: true,
		    closeBtn: false,
		    shade: 0.5,
		    skin: "layui-layer-lan",
		    area: ['450px', '500px'],
		    content: '../src/contact/wechat.html'
		});
	}
	else if(index==3)			// Phone
	{ 
		layer.open({
		    type: 2,
		    title: false,
		    shadeClose: true,
		    closeBtn: false,
		    shade: 0.5,
		    area: ['800px', '150px'],
		    content: '../src/contact/phone.html'
		});
	}
}
/*页面层-自定义
layer.open({
    type: 1,
    title: false,
    closeBtn: false,
    shadeClose: true,
    skin: 'yourclass',
    content: '自定义HTML内容'
});
*/

/*页面层-佟丽娅
layer.open({
    type: 1,
    title: false,
    closeBtn: false,
    area: '516px',
    skin: 'layui-layer-nobg', //没有背景色
    shadeClose: true,
    content: $('#tong')
});*/

/*iframe层
layer.open({
    type: 2,
    title: 'layer mobile页',
    shadeClose: true,
    shade: 0.8,
    area: ['380px', '90%'],
    content: 'http://layer.layui.com/mobile/' //iframe的url
}); */

function onClickSubMsg()
{
    name = $("div.message input[name='name']").val();
    email = $("div.message input[name='email']").val();
    message = $("div.message textarea[name='message']").val();
    if(name=="")
    {
        alert("提交失败：【姓名】不能为空！");
        return false;
    }
    else if(message=="")
    {
        alert("提交失败：【留言】不能为空！");
        return false;
    }
    $.ajax({
        type: "POST",
        url: "../../src/message.php",
        data: "name=" + name + "&email=" + email + "&message=" + message,
        success: function (result) {
            layer.msg("留言提交成功！");
        },
        error: function () {
            alert("提交失败：错误未知，请联系网站管理员！");
            return false;
        }
    });
}