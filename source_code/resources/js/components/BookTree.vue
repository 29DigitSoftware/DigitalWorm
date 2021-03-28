<template functional>
    <div>
        <div class="card">
            <div class="card-body book-tree">
                <img src="/img/book_tree.svg" alt="">
                <p>Book tree</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    functional: true,
}
</script>

<style scoped>
    .book-tree {
        display: flex;
        align-items: center;
        box-shadow: 0px 0px 12px #00000029;
        border: none;
        /* outline: none; */
        /* border-radius: 5%; */
    }

    .book-tree p {
        text-align: left;
        font: Condensed Bold 30px/37px 'Nunito';
        letter-spacing: 0px;
        color: #3C6E71;
        text-transform: uppercase;
        opacity: 1;
    }

    .book-tree img {
        margin-left: 15%;
        margin-right: 8%;
        width: 75px;
        height: 53px;
    }
</style>