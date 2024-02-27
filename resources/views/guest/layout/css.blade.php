<script src="https://cdn.tailwindcss.com"></script>
<style>
    .bgImage {
        position: relative;
        width: 100%;
        height: 100vh;
        background-image: url('https://i0.wp.com/robsforklift.com/wp-content/uploads/2021/03/Forklift-2.jpg?fit=1430%2C1200&ssl=1');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    #footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/
            height: 40px;
        }
</style>
<style>

    @import url("https://fonts.googleapis.com/css2?family=Michroma&display=swap");

    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    }

    .loading-page {
    position: absolute;
    top: 0;
    left: 0;
    background: linear-gradient(to right, #336175, #284954, #152b34);

    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    align-items: center;
    justify-content: center;
    color: #191654;
        }

    #svg {
    height: 150px;
    width: 150px;
    stroke: white;
    fill-opacity: 0;
    stroke-width: 3px;
    stroke-dasharray: 4500;
    animation: draw 4s ease;
    }

    @keyframes draw {
    0% {
        stroke-dashoffset: 4500;
    }
    100% {
        stroke-dashoffset: 0;
    }
    }

    .name-container {
    height: 30px;
    overflow: hidden;
    }

    .logo-name {
    color: #fff;
    font-size: 20px;
    letter-spacing: 12px;
    text-transform: uppercase;
    margin-left: 20px;
    font-weight: bolder;
    }
    </style>
