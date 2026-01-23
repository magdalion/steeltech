interface CookiePreferences {
  necessary: boolean
  functional: boolean
  thirdParty: boolean
}

interface StoredConsent {
  timestamp: number
  preferences: CookiePreferences
}

const STORAGE_KEY = 'cookieConsent'
const EXPIRATION_MS = 30 * 24 * 60 * 60 * 1000 // 30 days

export const useCookieConsent = () => {
  const hasConsented = useState<boolean>('cookieConsent:hasConsented', () => false)
  const preferences = useState<CookiePreferences>('cookieConsent:preferences', () => ({
    necessary: true,
    functional: false,
    thirdParty: false
  }))
  const showBanner = useState<boolean>('cookieConsent:showBanner', () => false)
  const showCustomize = useState<boolean>('cookieConsent:showCustomize', () => false)

  const loadConsent = (): StoredConsent | null => {
    if (import.meta.server) return null

    try {
      const stored = localStorage.getItem(STORAGE_KEY)
      if (!stored) return null

      const consent: StoredConsent = JSON.parse(stored)

      // Check if consent has expired
      if (Date.now() - consent.timestamp > EXPIRATION_MS) {
        localStorage.removeItem(STORAGE_KEY)
        return null
      }

      return consent
    } catch {
      return null
    }
  }

  const saveConsent = (prefs: CookiePreferences): void => {
    if (import.meta.server) return

    const consent: StoredConsent = {
      timestamp: Date.now(),
      preferences: prefs
    }

    localStorage.setItem(STORAGE_KEY, JSON.stringify(consent))
    preferences.value = prefs
    hasConsented.value = true
    showBanner.value = false
    showCustomize.value = false
  }

  const acceptAll = (): void => {
    saveConsent({
      necessary: true,
      functional: true,
      thirdParty: true
    })
  }

  const rejectNonEssential = (): void => {
    saveConsent({
      necessary: true,
      functional: false,
      thirdParty: false
    })
  }

  const saveCustomPreferences = (prefs: Partial<CookiePreferences>): void => {
    saveConsent({
      necessary: true, // Always true
      functional: prefs.functional ?? false,
      thirdParty: prefs.thirdParty ?? false
    })
  }

  const openSettings = (): void => {
    showCustomize.value = true
    showBanner.value = true
  }

  const initialize = (): void => {
    if (import.meta.server) return

    const stored = loadConsent()

    if (stored) {
      preferences.value = stored.preferences
      hasConsented.value = true
      showBanner.value = false
    } else {
      hasConsented.value = false
      showBanner.value = true
    }
  }

  return {
    hasConsented: readonly(hasConsented),
    preferences: readonly(preferences),
    showBanner,
    showCustomize,
    acceptAll,
    rejectNonEssential,
    saveCustomPreferences,
    openSettings,
    initialize
  }
}
