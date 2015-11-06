<!DOCTYPE html>
<?php
    if(!isset($_COOKIE['user_name']))
    {
        //header('location:../index.php');
    }
?>
<html lang="ch">
<head>
    <title>赖氏宗谱</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../css/zTreeStyle.css" type="text/css" />
    <style>
        html{
            background-image:url("../img/bg/bg.jpg");
        }
        body {
            margin: 0;
            padding: 0;
            text-align: center;
        }

        div, p, table, th, td {
            list-style: none;
            margin: 0;
            padding: 0;
            color: #333;
            font-size: 12px;
            font-family: dotum, Verdana, Arial, Helvetica, AppleGothic, sans-serif;
        }

        #introduceIframe {
            margin-left: 10px;
        }

        td#loginfo{
            text-align:right;
            font-size:20px;
            font-style:itali;
        }
        td._tree_title{
            font-size:15px;
            text-align:center;
        }
    </style>

    <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery.ztree.core-3.5.js"></script>
    <script type="text/javascript" src="../js/layer/layer.js" ></script>
    <script type="text/javascript" src="../js/myFunctions.js"></script>
    <script type="text/javascript" src="../js/contact.js"></script>
    <script type="text/javascript">
        var zTree;
        var introduceIframe;
        var setting = {
            view: {
                dblClickExpand: false,
                showLine: true,
                selectedMulti: false,
            },
            data: {
                simpleData: {
                    enable: true,
                    idKey: "id",
                    pIdKey: "pId",
                    rootPId: ""
                }
            },
            callback: {
                beforeClick: function(treeId, treeNode){ 
                    return true;
                },
                onClick: onClickTreeNode
            }
        };
        var zNodes = getTreeNodes();
        $(document).ready(function () {
            $.fn.zTree.init($("#maintree"), setting, zNodes);
            var zTree = $.fn.zTree.getZTreeObj("maintree");
            zTree.selectNode(zTree.getNodeByParam("id", 1));
            $("#introduceIframe").height(window.innerHeight-30);
            $("#introduceIframe").contents().find("td > input").attr("disabled", true);
        });
	</script>
</head>

<body>
    <table border="0" align="left" width="1300px">
        <tr>
            <td class="_tree_title">世系图</td>
            <td class="_tree_title" id="treeNodeId" align="center"> </td>
        </tr>
        <tr>
            <td width="250px" align="left" valign="top" style="border-right:#999999 3px dashed">
                <ul id="maintree" class="ztree" style="overflow:auto;"></ul>
            </td>
            <td width="1050px" align="left" valign="top">
                <iframe id="introduceIframe" name="introduceIframe" frameborder="0" scrolling="auto" width="100%" height="100%" src="../src/home.html"></iframe>
            </td>
        </tr>
    </table>
    <?php
    	require "../src/contact/contact.html";
    ?>
</body>
</html>

