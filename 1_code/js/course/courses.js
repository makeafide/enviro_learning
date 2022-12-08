function openCourse(id){
window.location.replace('?p=course-coursedetails&id='+id);
}

function openAssign(id){
window.location.replace('?p=course-assignment_unit&assignment_id='+id);
}

function openQuiz(id){
window.location.replace('?p=course-quiz_unit&quiz_id='+id);
}

function openExam(id){
window.location.replace('?p=course-exam_unit&exam_id='+id);
}

function openGradeDetails(id){
    window.location.replace('?p=grading-grade_details&id='+id);
}
