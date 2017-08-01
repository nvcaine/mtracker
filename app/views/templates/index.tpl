<!DOCTYPE html>
<html>

{include file='components/page-head.tpl'}

<body>

	<header>
		{include file='components/menu.tpl'}
	</header>

	<main class="container">
		{if isset($activeLogin)}
		<form id="label-cost-form" method="post">
			<div class="input-group input-group-lg input-container">
				<div id="item-dropdown-wrapper" class="dropdown">

					<input id="label-input" type="text" name="expense-item-label" class="form-control" placeholder="Enter item name" required autocomplete="off" data-toggle="dropdown">

					<ul id="item-autocomplete-dropdown" class="dropdown-menu" style="width:100%;">
						<li style="padding-right:10px;">
							<button type="button" class="close" data-toggle="dropdown">
								<span aria-hidden="true">&times;</span>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<div class="input-group input-group-lg input-container">
				<input id="cost-input" type="number" name="expense-amount" class="form-control" placeholder="Enter amount spent" required>
			</div>

			<input type="hidden" name="expense-item-id" value="">
			<input type="hidden" name="expense-action" value="add-expense">

			<button type="submit" id="submit_button" class="btn btn-lg btn-success">Submit</button>
			<button type="reset" class="btn btn-lg btn-warning">Reset</button>
		</form>
		{else}
		<p>Please login.</p>
		{/if}
	</main>

	{include file='components/footer.tpl'}

	{include file='components/page-footer.tpl'}
</body>

</html>