export type userData = {
    id: number,
    name: string,
    email: string,
    email_verified_at: string | null,
    is_admin: boolean,
    created_at: string,
    updated_at: string
}

export type ingredientData = {
    id: string,
    name: string,
    created_at: string,
    updated_at: string
}

export type unitData = {
    id: string,
    name: string,
    abbreviation: string,
    created_at: string,
    updated_at: string
}