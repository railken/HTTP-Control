$('body').on('submit', "[name='projects-create']", function(e) {
	e.preventDefault();

	var input_name = $(this).find("[name='name']");
	var input_description = $(this).find("[name='description']");


	var resolver = new ProjectResolver();
	resolver.create({
		name: input_name.val(),
		description: input_description.val()
	});

	input_name.val('');
	input_description.val('');
});

$('body').on('submit', '.projects-delete', function(e) {
	e.preventDefault();
	$('.modal').modal('hide');
	var id = $(this).find("[name='id']").val();

	var resolver = new ProjectResolver();
	resolver.remove(id);
	
});


$('body').on('submit', '.projects-edit', function(e) {
	
	e.preventDefault();

	var id = $(this).find("[name='id']").val();
	var input_name = $(this).find("[name='name']");
	var input_description = $(this).find("[name='description']");

	var resolver = new ProjectResolver();

	resolver.update(id, {
		name: input_name.val(),
		description: input_description.val()
	});

	input_name.val('');
	input_description.val('');

});
