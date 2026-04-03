function editAnimal(tagId) {
    fetch(animalURL + "?tagId=" + tagId)
    .then(res => res.json())
    .then(animal => {
        if(animal.error) {
            alert(animal.error);
            return;
        }
        // Populate form for editing
        tagInput.value = animal.tagId;
        document.getElementById("name").value = animal.name;
        document.getElementById("animalType").value = animal.animalType;
        document.getElementById("sex").value = animal.sex;
        document.getElementById("breed").value = animal.breed;
        document.getElementById("birthdate").value = animal.birthdate;
        document.getElementById("ownerContact").value = animal.ownerContact;
    });
}