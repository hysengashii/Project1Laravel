document.getElementById("editButton-{{ $comment->id }}").addEventListener("click", function() {
    var commentContent = document.querySelector(".comment-content");
    var updateForm = document.querySelector(".update-form-{{ $comment->id }}");



    commentContent.style.display = "none";
    updateForm.style.display = "block";
    document.getElementById("editButton-{{ $comment->id }}").style.display = "none";
});
console.log('Hello')
