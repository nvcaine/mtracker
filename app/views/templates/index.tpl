<!DOCTYPE html>
<html>

{include file='components/page-head.tpl'}

<body>

	<header>
		{include file='components/menu.tpl'}
	</header>

	<main class="container">
		<form id="label-cost-form" method="post">
			<div class="input-group input-group-lg input-container">
				<input id="label-input" type="text" class="form-control" placeholder="Enter item name" required>
			</div>
			<div class="input-group input-group-lg input-container">
				<input id="cost-input" type="number" class="form-control" placeholder="Enter amount spent" required>
			</div>
			<button type="submit" id="submit_button" class="btn btn-lg btn-success">Submit</button>
			<button type="reset" class="btn btn-lg btn-warning">Reset</button>
		</form>
	</main>

	{include file='components/footer.tpl'}

	{include file='components/page-footer.tpl'}
</body>

</html>