const styleSheet = document.createElement('style');
styleSheet.innerHTML = `
    .my-class {
        position: sticky;
        top: 0;
        left: 0;
        height: 100%;
        width: 200px; /* Adjust the width according to your needs */
        z-index: 1; /* Ensure the sidebar stays on top of other content */
        transition: all 0.2s ease-in-out; /* Add a transition effect when the sidebar changes position */
    }

    footer {
        height: 160px; /* Adjust to your desired height */
        background-color: #eee;
        bottom: 0;
        z-index: 999;
    }
    @media (max-width: 576px) {
        .hide-on-small {
            display: none;
        }
        .my-class {
            width: 70px;
        }
    }
`;
document.head.appendChild(styleSheet);
