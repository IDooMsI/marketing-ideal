var divFooter = document.getElementById("footer");
var url = window.location;
if (url.href.includes("admin") || url.href.includes("service") || url.href.includes("spec") || url.href.includes("job") || url.href.includes("subcategory")){
    divFooter.style.display = "none";
}
