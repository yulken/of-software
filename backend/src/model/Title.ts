interface Screenshot{
    id: string;
    path: string;
}

export default interface Title {
    id: string;
    name: string;
    description: string;
    cover: string;
    screenshots?: Screenshot[];
    platforms?: string[];
    generos?: string[];
};

