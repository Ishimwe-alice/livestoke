// Inside loadAnimals() after creating a row
row.innerHTML = `
    <td>${animal.tagId}</td>
    <td>${animal.name}</td>
    <td>${animal.animalType}</td>
    <td>${animal.sex}</td>
    <td>${animal.breed}</td>
    <td>${animal.age}</td>
    <td>${animal.isPregnant ? "Yes" : "No"}</td>
    <td>${animal.isSick ? "Yes" : "No"}</td>
    <td>${animal.ownerContact}</td>
    <td>
        <button onclick="editAnimal('${animal.tagId}')">Edit</button>
        <button onclick="deleteAnimal('${animal.tagId}')">Delete</button>
    </td>
`;