$('.logout').click(function(){
	$('#logout').submit();
})

$('.dish-image').change(function(){
	changeImage(this)
})

$('.myrestaurant-dishes-box').click(function(){
	name = $(this).data('name')
	description = $(this).data('description')
	image = $(this).data('image')
	deleteurl = $(this).data('deleteurl')

	$('#dishView').find('#dish-name').val(name)
	$('#dishView').find('#dish-description').val(description)
	$('#dishView').find('img').attr('src', image)

	$('#delete-form').attr('action', deleteurl)
})

$('.delete-dish').click(function(){
	$('#delete-form').submit()
})

function changeImage(input) {
    if(input.files && input.files[0]){
        var reader = new FileReader()
        reader.onload = function (e) {
            $('.dish-image-view').attr('src', e.target.result)
        }
        reader.readAsDataurl(input.files[0])
    }
}