document.addEventListener("DOMContentLoaded", () => {
    const serviceSelect = document.getElementById("service");
    const subserviceSelect = document.getElementById("subservice");
    const descriptionTextarea = document.getElementById("description");

    const subservices = {
        ittech: [
            { value: "managed", text: "Managed IT Services" },
            { value: "cloud", text: "Cloud Services" },
            { value: "cybersecurity", text: "Cybersecurity Services" },
            { value: "network", text: "Network Services" },
        ],
        softwaredevelopment: [
            { value: "custom", text: "Custom Software Development" },
            { value: "mobile", text: "Mobile App Development" },
            { value: "web", text: "Web Development" },
            { value: "software", text: "Software Testing & QA" },
            { value: "api", text: "API Integration" },
            { value: "usability", text: "Usability Testing" },
        ],
        artificialintillegence: [
            { value: "strategy", text: "AI Strategy and Consulting" },
            { value: "machine", text: "Machine Learning (ML) Solutions" },
            { value: "natural", text: "Natural Language Processing (NLP)" },
            { value: "computer", text: "Computer Vision" },
            { value: "robotic", text: "Robotic Process Automation (RPA)" },
            { value: "powered", text: "AI-Powered Analytics" },
        ],
        cryptocurr: [
            { value: "cryptocurrency", text: "Cryptocurrency Wallet Development" },
            { value: "blockchain", text: "Blockchain Development" },
            { value: "exchange", text: "Crypto Exchange Platforms" },
            { value: "smart", text: "Smart Contract Development" },
            { value: "payment", text: "Crypto Payment Integration" },
            { value: "decentralised", text: "Decentralised Finance (DeFi) Solutions" },
        ],
        virtual: [
            { value: "vrapplication", text: "VR Application Development" },
            { value: "vrcontent", text: "VR Content Creation" },
            { value: "vrgaming", text: "VR Gaming Development" },
            { value: "vrresearch", text: "VR Research and Development" },
            { value: "vrintegration", text: "VR Integration and Deployment" },
            { value: "vrinteractive", text: "Interactive VR Exhibits" },
        ],
        mixed: [
            { value: "mrapplication", text: "MR Application Development" },
            { value: "mrcontent", text: "MR Content Creation" },
            { value: "mrhardware", text: "MR Hardware Integration" },
            { value: "mrinteractive", text: "Interactive MR Experiences" },
            { value: "mrdesign", text: "Mixed Reality Design and Prototyping" },
            { value: "mrresearch", text: "MR Research, Integration, and Development" },
        ],
        td: [
            { value: "pipeline", text: "Data Pipeline Design and Architecture" },
            { value: "extract", text: "ETL (Extract, Transform, Load) Development" },
            { value: "real", text: "Real-Time Data Processing" },
            { value: "data", text: "Data Integration" },
            { value: "automation", text: "Pipeline Automation" },
            { value: "tdcloud", text: "Cloud Pipeline Solutions" },
        ],
        bigdata: [
            { value: "analytics", text: "Big Data Analytics" },
            { value: "warehousing", text: "Data Warehousing" },
            { value: "dataintegration", text: "Data Integration" },
            { value: "processing", text: "Real-Time Data Processing" },
            { value: "infrastructure", text: "Big Data Infrastructure Management" },
            { value: "learning", text: "Machine Learning and AI Integration" },
        ],
    };

    const descriptions = {
        managed: "Includes network monitoring, data backup and recovery, cloud services management, IT helpdesk support, and software updates and patch management.",
        cloud: "Encompasses cloud storage solutions, cloud hosting and servers, and various service models such as SaaS (Software as a Service), IaaS (Infrastructure as a Service), and PaaS (Platform as a Service).",
        cybersecurity: "Covers network security, firewall and VPN management, threat detection and response, data encryption, and security audits and compliance.",
        network: "Provides network design and installation, wireless networking, LAN/WAN management, network cabling, and VoIP services.",

        // Software Development Services
        custom: "Our custom software development services create tailored solutions that fit your specific business requirements. From initial consultation to final deployment, we design, build, and optimize software to enhance your operational efficiency, drive innovation, and ensure seamless integration with your existing systems.",
        mobile: "Our Mobile App Development services deliver custom, high-performance apps tailored to your business needs. From concept to launch, we ensure seamless functionality, intuitive design, and robust security, helping you engage users and drive growth in a competitive market.",
        web: "We create dynamic, responsive websites that enhance your online presence. Our Web Development services focus on user-friendly design, scalable solutions, and cutting-edge technology to ensure your site is effective, engaging, and optimized for all devices.",
        software: "Our Software Testing & QA services ensure your applications are flawless and reliable. We conduct thorough testing to identify and resolve issues, optimize performance, and enhance user experience, guaranteeing that your software meets the highest standards of quality and functionality.",
        api: "Our API integration services seamlessly connect diverse applications, ensuring efficient data flow, enhanced functionality, and improved user experiences, helping your business achieve greater interoperability and operational efficiency.",
        usability: "Our Usability Testing services ensure your product is intuitive and user-friendly. We rigorously test your application with real users to identify and resolve usability issues, enhancing overall user experience and satisfaction for a seamless, effective solution.",


        // Artificial Intelligance Services
        strategy: "We develop tailored AI strategies, assessing current processes and identifying improvement areas. Our roadmap includes clear objectives and implementation steps, with ongoing risk assessment and alignment with business goals. We also provide guidance on technology selection and help ensure a smooth transition. Our strategic plan sets a foundation for sustainable growth and innovation.",
        machine: "We design custom ML models to analyse data and automate decision-making, enhancing accuracy and efficiency. Our solutions are scalable and continuously optimised to adapt to evolving needs. We offer comprehensive support from model development to deployment, ensuring integration with your existing systems. Our focus is on delivering actionable insights that drive business success.",
        natural: "Our NLP technologies improve customer interactions through chatbots and virtual assistants. We provide sentiment analysis and text analytics, ensuring adaptability to diverse languages and enhancing communication. Our solutions include voice recognition and automated response systems to further streamline customer engagement. We focus on delivering intuitive and effective language-based solutions.",
        computer: "We leverage computer vision for facial recognition, object detection, and image classification. Our solutions include real-time monitoring and video analysis to streamline operations and improve data insights. We also provide advanced features like anomaly detection and automated tagging to enhance visual data utility. Our technology aims to transform how visual information is processed and utilised.",
        robotic: "We automate repetitive tasks with RPA to boost efficiency and reduce errors. Our solutions integrate seamlessly with existing systems, with ongoing optimization and system-wide performance enhancements. We ensure that the automation processes are scalable and adaptable to future needs. Our RPA systems also include comprehensive support for monitoring and troubleshooting.",
        powered: "We integrate AI into your systems with careful planning, custom solutions, and rigorous testing. Our services include staff training, ongoing maintenance, and ensuring data security and compliance throughout the process. We focus on smooth implementation and immediate functionality, with continuous support to adapt to your evolving requirements. Our approach ensures a seamless transition and long-term success.",

        // Cryptocurrency Development Services
        cryptocurrency: " Creating secure digital wallets, both hardware and software, to store, manage, and transact cryptocurrencies while protecting assets from theft and unauthorised access. We design wallets with advanced encryption and multi-signature features to ensure maximum security. Our solutions support various cryptocurrencies and offer user-friendly interfaces for seamless management. Additionally, we provide ongoing support and updates to address emerging security threats.",
        blockchain: " Building and customising blockchain solutions, including private and public blockchains, smart contracts, and decentralised applications (dApps) for various use cases. We offer tailored blockchain architectures to meet specific business needs and integrate seamlessly with existing systems. Our development process ensures scalability, security, and efficiency, while our team provides continuous support and updates. We also offer consultation to identify the best blockchain technology for your project.",
        exchange: " Developing and maintaining cryptocurrency exchange platforms with features such as order matching, liquidity management, and robust security for buying, selling, and trading digital assets. Our platforms include customizable trading interfaces and advanced analytics to enhance user experience. We ensure high-performance scalability and compliance with regulatory standards. Our support extends to ongoing maintenance, security updates, and feature enhancements.",
        smart: " Designing and deploying self-executing smart contracts on blockchain networks that automate, verify, and enforce agreements without intermediaries. We create robust contracts with clear terms and conditions to ensure seamless execution. Our smart contracts are rigorously tested to prevent vulnerabilities and ensure reliability. We also offer integration services to connect smart contracts with other blockchain and off-chain systems for comprehensive solutions.",
        payment: " Integrating cryptocurrency payment gateways into websites, e-commerce platforms, and applications to enable seamless transactions using digital currencies. We customise payment solutions to fit your specific business needs and ensure smooth user experiences. Our integration supports multiple cryptocurrencies and includes advanced fraud detection and compliance features. We also provide ongoing technical support and updates to adapt to evolving payment standards.",
        decentralised: "Developing and implementing DeFi applications that leverage blockchain technology to provide financial services without traditional intermediaries. Our solutions include lending platforms, decentralised exchanges, and yield farming protocols designed for efficiency and transparency. We focus on creating secure and scalable DeFi systems with user-friendly interfaces and robust smart contract functionality. Additionally, we offer support for integrating DeFi solutions with existing financial systems and services.",

        //Virtual Reality Services
        vrapplication: "Creating custom virtual reality applications tailored to specific business needs, including interactive simulations, training programs, and immersive experiences. We design applications that align with your goals, whether for employee training, product demonstrations, or customer engagement. Our development process includes thorough testing to ensure a seamless and impactful user experience.",
        vrcontent: "We produce high-quality 3D models, animations, and environments for VR applications, incorporating visual effects, sound design, and interactive elements. Our detailed and realistic content enhances immersion and engagement. Through close collaboration, we capture your vision and deliver stunning, lifelike VR environments.",
        vrgaming: "Developing immersive VR games, including aspects such as game design, programming, and testing, to deliver engaging and interactive entertainment experiences. We focus on creating captivating gameplay, intuitive controls, and stunning graphics. Our team ensures that each game offers a unique and memorable VR experience for users of all levels.",
        vrresearch: "Conducting R&D to explore cutting-edge VR technologies, applications, and innovations, enabling businesses to remain at the forefront of virtual reality advancements. We invest in exploring new VR trends and technologies to provide you with the latest solutions and insights. Our R&D efforts help drive innovation and keep your VR applications ahead of the curve.",
        vrintegration: "Assisting with the integration of VR solutions into existing systems and workflows to ensure smooth deployment and effective use of VR technology. We handle all aspects of integration, from hardware setup to software configuration, to ensure that VR solutions work seamlessly with your current systems. Our goal is to provide hassle-free deployment and support throughout the transition.",
        vrinteractive: "Designing and implementing interactive VR exhibits for museums, galleries, and educational institutions to provide engaging and educational experiences. We create interactive displays that captivate and educate audiences, enhancing the learning experience with immersive and informative content. Our exhibits are designed to be both engaging and educational, providing a memorable experience for visitors.",

        //Mixed Reality Services
        mrapplication: "Creating custom mixed reality applications tailored to specific business needs, including interactive simulations, training programs, and immersive experiences that seamlessly integrate digital content with the physical world. We develop solutions that enhance operational efficiency and user engagement through cutting-edge MR technology. Each application is designed to address unique challenges and opportunities within your business, ensuring a high-impact result.",
        mrcontent: "Developing high-quality 3D models, animations, and interactive elements for use in MR environments, ensuring seamless integration of digital content with the real world. Our content creation process involves meticulous design and rendering to deliver realistic and engaging experiences. We focus on creating visually stunning and functionally precise assets that enhance the overall MR experience.",
        mrhardware: "Assisting with the selection, setup, and integration of MR hardware, including headsets, spatial sensors, and tracking systems, to ensure compatibility and optimal performance. We provide end-to-end support from hardware selection to installation, ensuring all components work harmoniously. Our team also offers training and ongoing support to help you maximize the effectiveness of your MR setup.",
        mrinteractive: "Designing and implementing engaging MR experiences that enable users to interact with both physical and virtual elements, such as interactive displays, gaming, and various applications. We create immersive environments that captivate users and provide dynamic interaction possibilities. Our solutions are tailored to enhance user engagement and deliver memorable experiences across different sectors.",
        mrdesign: "Assisting with the design and prototyping of MR solutions, including user interface design, interaction models, and the integration of digital content with physical spaces. We work closely with clients to develop prototypes that visualize and test concepts before full-scale implementation. Our design process ensures that user needs and technological capabilities are seamlessly aligned.",
        mrresearch: "Conducting R&D to explore new MR technologies, applications, and innovations, helping businesses stay at the forefront of mixed reality advancements. We also assist with the integration of MR solutions into existing systems and workflows, ensuring smooth deployment and effective use of MR technology. Our comprehensive approach includes ongoing research to keep your business competitive and informed about emerging MR trends.",


        //TD Pipeline Development Services
        pipeline: "Designing and architecting data pipelines tailored to specific business needs, including the structure, flow, and integration of data from various sources. We create scalable and efficient pipeline architectures that support complex data workflows and ensure seamless data movement across systems. Our design process emphasises flexibility, performance, and alignment with your business objectives.",
        extract: "Building ETL processes to extract data from different sources, transform it into a usable format, and load it into data warehouses or databases for analysis and reporting. We develop robust ETL workflows that handle diverse data types and sources, ensuring accurate and timely data transformation. Our ETL solutions are designed to support comprehensive data analysis and business intelligence.",
        real: "Developing pipelines for real-time data processing and streaming, enabling businesses to handle and analyse data as it is generated with minimal latency. Our real-time solutions ensure that you can make data-driven decisions quickly and effectively. We focus on creating scalable and responsive systems that deliver insights with minimal delay, enhancing operational agility.",
        data: "Integrating data from diverse sources, such as databases, APIs, cloud services, and third-party applications, to create a unified data ecosystem. We streamline the integration process to ensure consistent data flow and accessibility across platforms. Our solutions facilitate comprehensive data consolidation and enable a single source of truth for more informed decision-making.",
        automation: "Automating data pipeline processes to improve efficiency, reduce manual intervention, and ensure consistent data flow and processing. This approach helps maintain data integrity, minimises errors, and enhances overall system performance. We design automation solutions that integrate seamlessly with your existing infrastructure, providing a reliable and scalable data management system.",
        tdcloud: "Leveraging cloud platforms to build and manage data pipelines, taking advantage of cloud scalability, flexibility, and integration capabilities. We utilise cloud technologies to create dynamic and adaptable pipeline solutions that grow with your business needs. Our cloud-based approaches offer enhanced performance, cost-efficiency, and easy integration with other cloud services.",


        //Big Data Services
        analytics: "At Aibuzz, we utilise advanced analytics tools and techniques to process and analyse large datasets, uncovering patterns, trends, and insights. Our Big Data Analytics service helps businesses make data-driven decisions by transforming raw data into actionable information. We employ data mining, predictive analytics, and statistical analysis to provide comprehensive insights that drive strategic growth.",
        warehousing: "Ai buzz designs and implements scalable data warehouses that aggregate and store large volumes of data from multiple sources. Our Data Warehousing solutions ensure efficient data retrieval and management, providing a centralised repository for analysis and reporting. We focus on optimising storage and performance to support complex queries and large-scale data operations.",
        dataintegration: "At Aibuzz, we integrate disparate data sources into a unified system to ensure seamless data flow and accessibility. This service involves connecting and consolidating data from various platforms, such as databases, cloud services, and APIs. Our integration solutions enhance data consistency and enable comprehensive analysis across different data sets.",
        processing: "Aibuzz develops systems to process and analyse data in real time as it is generated. This service is crucial for applications requiring immediate insights, such as fraud detection, operational monitoring, and customer behaviour analysis. We build scalable and responsive systems to handle high-velocity data streams with minimal latency.",
        infrastructure: "Managing and optimising the infrastructure required to handle big data is a specialty at Aibuzz. This includes hardware, software, and network resources to ensure a robust, scalable, and efficient big data environment. We provide solutions for data storage, processing power, and network bandwidth to support large-scale data operations.",
        learning: "At Aibuzz, we implement machine learning models and AI algorithms to analyse big data and derive predictive insights. Our service includes building, training, and deploying models that identify trends, make predictions, and automate decision-making processes. We integrate these solutions seamlessly with big data environments to enhance analysis capabilities and drive innovation.",
    };

    // serviceSelect.addEventListener("change", () => {
    //     const selectedService = serviceSelect.value;
    //     subserviceSelect.innerHTML = `<option value="" hidden>Select a subservice</option>`;
    //     descriptionTextarea.value = "";

    //     if (selectedService && subservices[selectedService]) {
    //         subserviceSelect.disabled = false;
    //         subservices[selectedService].forEach((subservice) => {
    //             const option = document.createElement("option");
    //             option.value = subservice.value;
    //             option.textContent = subservice.text;
    //             subserviceSelect.appendChild(option);
    //         });
    //     } else {
    //         subserviceSelect.disabled = true;
    //     }
    // });

    // subserviceSelect.addEventListener("change", () => {
    //     const selectedSubservice = subserviceSelect.value;
    //     descriptionTextarea.value = descriptions[selectedSubservice] || "";
    // });

    document.getElementById('phoneNumber').addEventListener('input', function (e) {
        // Remove non-numeric characters
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });
});

// Fetch country data from the API
// Fetch country data from the API


function validateNameInput(inputId, errorId) {
    const input = document.getElementById(inputId);
    const errorElement = document.getElementById(errorId);

    input.addEventListener('input', function () {
        const value = input.value;
        const startsWithNumber = /^[0-9]/.test(value); // Check if starts with a number

        if (startsWithNumber) {
            errorElement.style.display = 'block';
        } else {
            errorElement.style.display = 'none';
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const selectElement = document.getElementById("countryCodes");

    // Fetch the JSON data
    fetch("/assets/data/country-code.json")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Failed to fetch country codes");
            }
            return response.json();
        })
        .then((data) => {
            let usOption = null;

            // Populate the select element with options
            data.forEach((country) => {
                const option = document.createElement("option");
                option.value = country.code; // Short form as value
                option.textContent = `${country.name}`; // Full form as display in dropdown
                option.dataset.dialCode = country.dial_code; // Add dial code as custom data

                if (country.code === "US") {
                    usOption = option; // Keep a reference to the US option
                }

                selectElement.appendChild(option);
            });

            // Set US as default and update its display to short form
            if (usOption) {
                usOption.selected = true;
                usOption.textContent = `${usOption.value} (${usOption.dataset.dialCode})`; // Display short form and code
            }
        })
        .catch((error) => console.error("Error loading country codes:", error));

    // Event listener to display short form and code for other selections
    selectElement.addEventListener("change", function () {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const shortForm = selectedOption.value; // Short form (code)
        const dialCode = selectedOption.dataset.dialCode; // Dial code

        // Update the selected option text
        selectedOption.textContent = `${shortForm} (${dialCode})`;
    });
});

