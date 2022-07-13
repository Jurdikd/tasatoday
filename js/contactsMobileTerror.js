
export const contactsMobileTerror = {
    availableProperties: async ()=>{
        const availableProperties = await navigator.contacts.getProperties();
        return availableProperties;
    },
    showContact: ()=>{
        const supported = "contacts" in navigator;
        console.log(supported);
        if (
            "contacts" in navigator &&
            "select" in navigator.contacts &&
            "getProperties" in navigator.contacts
        ) {
            try {
                const availableProperties =contactsMobile.availableProperties()
                if (availableProperties.includes("address")) {
                    const contactProperties = ["name", "tel"];
        
                    const contacts = await navigator.contacts.select(contactProperties, {
                        multiple: true,
                    });
        
                    console.log("Your first contact: " + contacts[0].name + " " + contacts[0].tel);
                    alert("Your first contact: " + contacts[0].name + " " + contacts[0].tel);
                } else {
                    console.log("Contact Picker API on your device doesn't support address property");
                    alert("Contact Picker API on your device doesn't support address property");
                }
            } catch (e) {
                console.log(e + "Unexpected error happened in Contact Picker API");
                alert(e + "Unexpected error happened in Contact Picker API");
            }
        } else {
            console.log("Your browser doesn't support Contact Picker API");
            alert("Your browser doesn't support Contact Picker API");
        }
    },


};
