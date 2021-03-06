<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery UI Sortable - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!--  <link rel="stylesheet" href="/resources/demos/style.css">-->
    <style>
        #sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 60%;
        }
        
        #sortable li {
            margin: 0 3px 3px 3px;
            padding: 0.4em;
            padding-left: 1.5em;
            font-size: 1.4em;
            height: 18px;
        }
        
        #sortable li span {
            position: absolute;
            margin-left: -1.3em;
        }
    </style>
    <script>
        $(function () {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        });
    </script>
</head>

<body>
    <ul id="sortable">
        <?php foreach($table as $row) { ?>
        <li class="ui-state-default" data-id="<?php echo $row->id?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
            <?php echo $row->name;?></li>
        <?php }?>
    </ul>
    <button class="submitsort">Save</button>
</body>

</html>           
<script type="text/javascript">
    $(document).ready(function () {

        $(function () {
            $('.submitsort').click(function () {
                $('ul').sortable({
                    connectionWith: "ul"
                });
                var data = $('ul').sortable("serialize");
                console.log(data);
                var liIds = $('li').map(function (i, n) {
                    return $(n).attr('id');
                }).get().join(',');
                console.log(liIds);
                $.ajax({
                    type: "GET",
                    url: "<?php echo site_url('site/updateSort');?>",
                    data: "ids=" + liIds,
                    success: function (data) {
                        alert(data);
                    }
                });
            });
        });

    });
</script>