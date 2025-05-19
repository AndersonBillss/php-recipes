export interface userData {
    id: number,
    name: string,
    email: string,
    email_verified_at: string | null,
    is_admin: boolean,
    created_at: string,
    updated_at: string
}

export interface ingredientData {
    id: string,
    name: string,
    created_at: string,
    updated_at: string
}

export interface unitData {
    id: string,
    name: string,
    abbreviation: string,
    created_at: string,
    updated_at: string
}

export interface step {
    title: string,
    text: string
}