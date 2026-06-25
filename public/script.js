function showSection(sectionID) {
    // hide all content sections (create/read/update/delete)
    const sections = document.querySelectorAll('.content');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // hide home section
    const homeSection = document.querySelector('.homecontent');
    if (homeSection) {
        homeSection.style.display = 'none';
    }

    // show selected section
    const activeSection = document.getElementById(sectionID);
    if (activeSection) {
        activeSection.style.display = 'block';
    }
}