$('.logout').click(function(){
	$('#logout').submit();
})

$('.dish-image').change(function(){
	changeImage(this)
})

function changeImage(input) {
    if(input.files && input.files[0]){
        var reader = new FileReader()
        reader.onload = function (e) {
            $('.dish-image-view').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}