function showSection(id){
    document.querySelectorAll('.content, .homecontent').forEach(sec=>{
        sec.style.display = 'none';
    });
    document.getElementById(id).style.display = 'block';
}

document.addEventListener("DOMContentLoaded", ()=>{
    const clr = document.getElementById("clrbtn");
    if(clr){
        clr.onclick = ()=>{
            document.querySelectorAll("input").forEach(i=> i.value="");
        };
    }

    const params = new URLSearchParams(window.location.search);
    if(params.get("status") === "success"){
        const toast = document.getElementById("success-toast");
        toast.classList.remove("toast-hidden");

        setTimeout(()=>{
            toast.classList.add("toast-hidden");
        },3000);
    }
});