<html>
    <head>
        <title>Javascript alert box example</title>
    </head>
    <body>
        <h1>Yee</h1>
       <script type="text/javascript">
			function newPopup(url) {
				popupWindow = window.open(
					url,'popUpWindow','height=300,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
			}
		</script>
		<p><a href="JavaScript:newPopup('personnages/personnages.php');">Open a popup window</a></p>
    </body>
</html>