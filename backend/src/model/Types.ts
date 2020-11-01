export interface Genre{
    id: string,
    name: string
}

export interface Platform{
    id: string,
    name: string
}

export interface Screenshot{
    title_id: string;
    path: string;
}

export interface Title {
    id: string;
    name: string;
    description: string;
    cover: string;
    screenshots?: Screenshot[];
    platforms?: string[];
    generos?: string[];
};

